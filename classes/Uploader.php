<?php

/**
 * Validated image upload handling per SECURITY_REVIEW.md §7:
 * extension + MIME allowlist, re-encoded through GD (strips anything hidden
 * in the original file bytes), random filename (never the user's original).
 */
class Uploader
{
    private const ALLOWED_MIME = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
    ];

    private const MAX_BYTES = 5 * 1024 * 1024; // 5MB

    /**
     * @param array $file one entry from $_FILES
     * @return string relative path (e.g. "uploads/products/abc123.jpg") on success
     * @throws RuntimeException on any validation failure
     */
    public static function handleImage(array $file, string $subdirectory): string
    {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            throw new RuntimeException('No file was uploaded.');
        }
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException('Upload failed (error code ' . $file['error'] . ').');
        }
        if ($file['size'] > self::MAX_BYTES) {
            throw new RuntimeException('File is too large (max 5MB).');
        }

        $mime = mime_content_type($file['tmp_name']);
        if (!isset(self::ALLOWED_MIME[$mime])) {
            throw new RuntimeException('Only JPG, PNG, or WEBP images are allowed.');
        }

        $image = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($file['tmp_name']),
            'image/png'  => @imagecreatefrompng($file['tmp_name']),
            'image/webp' => @imagecreatefromwebp($file['tmp_name']),
        };

        if ($image === false) {
            throw new RuntimeException('The uploaded file is not a valid image.');
        }

        $extension = self::ALLOWED_MIME[$mime];
        $filename = bin2hex(random_bytes(16)) . '.' . $extension;

        $relativeDir = 'uploads/' . trim($subdirectory, '/');
        $absoluteDir = BASE_PATH . '/' . $relativeDir;
        if (!is_dir($absoluteDir)) {
            mkdir($absoluteDir, 0755, true);
        }

        $destination = $absoluteDir . '/' . $filename;

        $saved = match ($mime) {
            'image/jpeg' => imagejpeg($image, $destination, 85),
            'image/png'  => imagepng($image, $destination, 6),
            'image/webp' => imagewebp($image, $destination, 85),
        };
        imagedestroy($image);

        if (!$saved) {
            throw new RuntimeException('Could not save the uploaded image.');
        }

        return $relativeDir . '/' . $filename;
    }
}
