<html>
<body>
<?php
if (isset($_POST["PlaceOrder"]))
{
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    $name = $_POST['name'];
    $mobile= $_POST['mobile'];
    $customer_email = $_POST['email'];
    $address = $_POST['address'];
    
        $prod_1_name = $_POST['prod_1_name'];
        $prod_1_price = $_POST['prod_1_disc_price'];
        $prod_1_quant = $_POST['prod_1_quant'];

        $prod_2_name = $_POST['prod_2_name'];
        $prod_2_price = $_POST['prod_2_disc_price'];
        $prod_2_quant = $_POST['prod_2_quant'];

        $prod_3_name = $_POST['prod_3_name'];
        $prod_3_price = $_POST['prod_3_disc_price'];
        $prod_3_quant = $_POST['prod_3_quant'];

        $prod_4_name = $_POST['prod_4_name'];
        $prod_4_price = $_POST['prod_4_disc_price'];
        $prod_4_quant = $_POST['prod_4_quant'];

        $prod_5_name = $_POST['prod_5_name'];
        $prod_5_price = $_POST['prod_5_disc_price'];
        $prod_5_quant = $_POST['prod_5_quant'];

        $prod_6_name = $_POST['prod_6_name'];
        $prod_6_price = $_POST['prod_6_disc_price'];
        $prod_6_quant = $_POST['prod_6_quant'];

        $prod_7_name = $_POST['prod_7_name'];
        $prod_7_price = $_POST['prod_7_disc_price'];
        $prod_7_quant = $_POST['prod_7_quant'];

        $prod_8_name = $_POST['prod_8_name'];
        $prod_8_price = $_POST['prod_8_disc_price'];
        $prod_8_quant = $_POST['prod_8_quant'];

        $prod_9_name = $_POST['prod_9_name'];
        $prod_9_price = $_POST['prod_9_disc_price'];
        $prod_9_quant = $_POST['prod_9_quant'];

        $prod_10_name = $_POST['prod_10_name'];
        $prod_10_price = $_POST['prod_10_disc_price'];
        $prod_10_quant = $_POST['prod_10_quant'];


        $prod_11_name = $_POST['prod_11_name'];
        $prod_11_price = $_POST['prod_11_disc_price'];
        $prod_11_quant = $_POST['prod_11_quant'];

        $prod_12_name = $_POST['prod_12_name'];
        $prod_12_price = $_POST['prod_12_disc_price'];
        $prod_12_quant = $_POST['prod_12_quant'];

        $prod_13_name = $_POST['prod_13_name'];
        $prod_13_price = $_POST['prod_13_disc_price'];
        $prod_13_quant = $_POST['prod_13_quant'];

        $prod_14_name = $_POST['prod_14_name'];
        $prod_14_price = $_POST['prod_14_disc_price'];
        $prod_14_quant = $_POST['prod_14_quant'];

        $prod_15_name = $_POST['prod_15_name'];
        $prod_15_price = $_POST['prod_15_disc_price'];
        $prod_15_quant = $_POST['prod_15_quant'];

        $prod_16_name = $_POST['prod_16_name'];
        $prod_16_price = $_POST['prod_16_disc_price'];
        $prod_16_quant = $_POST['prod_16_quant'];

        $prod_17_name = $_POST['prod_17_name'];
        $prod_17_price = $_POST['prod_17_disc_price'];
        $prod_17_quant = $_POST['prod_17_quant'];

        $prod_18_name = $_POST['prod_18_name'];
        $prod_18_price = $_POST['prod_18_disc_price'];
        $prod_18_quant = $_POST['prod_18_quant'];

        $prod_19_name = $_POST['prod_19_name'];
        $prod_19_price = $_POST['prod_19_disc_price'];
        $prod_19_quant = $_POST['prod_19_quant'];

        $prod_20_name = $_POST['prod_20_name'];
        $prod_20_price = $_POST['prod_20_disc_price'];
        $prod_20_quant = $_POST['prod_20_quant'];

        $prod_21_name = $_POST['prod_21_name'];
        $prod_21_price = $_POST['prod_21_disc_price'];
        $prod_21_quant = $_POST['prod_21_quant'];

        $prod_22_name = $_POST['prod_22_name'];
        $prod_22_price = $_POST['prod_22_disc_price'];
        $prod_22_quant = $_POST['prod_22_quant'];

        $prod_23_name = $_POST['prod_23_name'];
        $prod_23_price = $_POST['prod_23_disc_price'];
        $prod_23_quant = $_POST['prod_23_quant'];

        $prod_24_name = $_POST['prod_24_name'];
        $prod_24_price = $_POST['prod_24_disc_price'];
        $prod_24_quant = $_POST['prod_24_quant'];

        $prod_25_name = $_POST['prod_25_name'];
        $prod_25_price = $_POST['prod_25_disc_price'];
        $prod_25_quant = $_POST['prod_25_quant'];

        $prod_26_name = $_POST['prod_26_name'];
        $prod_26_price = $_POST['prod_26_disc_price'];
        $prod_26_quant = $_POST['prod_26_quant'];

        $prod_27_name = $_POST['prod_27_name'];
        $prod_27_price = $_POST['prod_27_disc_price'];
        $prod_27_quant = $_POST['prod_27_quant'];

        $prod_28_name = $_POST['prod_28_name'];
        $prod_28_price = $_POST['prod_28_disc_price'];
        $prod_28_quant = $_POST['prod_28_quant'];

        $prod_29_name = $_POST['prod_29_name'];
        $prod_29_price = $_POST['prod_29_disc_price'];
        $prod_29_quant = $_POST['prod_29_quant'];

        $prod_30_name = $_POST['prod_30_name'];
        $prod_30_price = $_POST['prod_30_disc_price'];
        $prod_30_quant = $_POST['prod_30_quant'];

        $prod_31_name = $_POST['prod_31_name'];
        $prod_31_price = $_POST['prod_31_disc_price'];
        $prod_31_quant = $_POST['prod_31_quant'];

        $prod_32_name = $_POST['prod_32_name'];
        $prod_32_price = $_POST['prod_32_disc_price'];
        $prod_32_quant = $_POST['prod_32_quant'];

        $prod_33_name = $_POST['prod_33_name'];
        $prod_33_price = $_POST['prod_33_disc_price'];
        $prod_33_quant = $_POST['prod_33_quant'];

        $prod_34_name = $_POST['prod_34_name'];
        $prod_34_price = $_POST['prod_34_disc_price'];
        $prod_34_quant = $_POST['prod_34_quant'];

        $prod_35_name = $_POST['prod_35_name'];
        $prod_35_price = $_POST['prod_35_disc_price'];
        $prod_35_quant = $_POST['prod_35_quant'];

        $prod_36_name = $_POST['prod_36_name'];
        $prod_36_price = $_POST['prod_36_disc_price'];
        $prod_36_quant = $_POST['prod_36_quant'];

        $prod_37_name = $_POST['prod_37_name'];
        $prod_37_price = $_POST['prod_37_disc_price'];
        $prod_37_quant = $_POST['prod_37_quant'];

        $prod_38_name = $_POST['prod_38_name'];
        $prod_38_price = $_POST['prod_38_disc_price'];
        $prod_38_quant = $_POST['prod_38_quant'];

        $prod_39_name = $_POST['prod_39_name'];
        $prod_39_price = $_POST['prod_39_disc_price'];
        $prod_39_quant = $_POST['prod_39_quant'];

        $prod_40_name = $_POST['prod_40_name'];
        $prod_40_price = $_POST['prod_40_disc_price'];
        $prod_40_quant = $_POST['prod_40_quant'];

        $prod_41_name = $_POST['prod_41_name'];
        $prod_41_price = $_POST['prod_41_disc_price'];
        $prod_41_quant = $_POST['prod_41_quant'];

        $prod_42_name = $_POST['prod_42_name'];
        $prod_42_price = $_POST['prod_42_disc_price'];
        $prod_42_quant = $_POST['prod_42_quant'];

        $prod_43_name = $_POST['prod_43_name'];
        $prod_43_price = $_POST['prod_43_disc_price'];
        $prod_43_quant = $_POST['prod_43_quant'];

        $prod_44_name = $_POST['prod_44_name'];
        $prod_44_price = $_POST['prod_44_disc_price'];
        $prod_44_quant = $_POST['prod_44_quant'];

        $prod_45_name = $_POST['prod_45_name'];
        $prod_45_price = $_POST['prod_45_disc_price'];
        $prod_45_quant = $_POST['prod_45_quant'];

        $prod_46_name = $_POST['prod_46_name'];
        $prod_46_price = $_POST['prod_46_disc_price'];
        $prod_46_quant = $_POST['prod_46_quant'];

        $prod_47_name = $_POST['prod_47_name'];
        $prod_47_price = $_POST['prod_47_disc_price'];
        $prod_47_quant = $_POST['prod_47_quant'];

        $prod_48_name = $_POST['prod_48_name'];
        $prod_48_price = $_POST['prod_48_disc_price'];
        $prod_48_quant = $_POST['prod_48_quant'];

        $prod_49_name = $_POST['prod_49_name'];
        $prod_49_price = $_POST['prod_49_disc_price'];
        $prod_49_quant = $_POST['prod_49_quant'];

        $prod_50_name = $_POST['prod_50_name'];
        $prod_50_price = $_POST['prod_50_disc_price'];
        $prod_50_quant = $_POST['prod_50_quant'];

        $prod_51_name = $_POST['prod_51_name'];
        $prod_51_price = $_POST['prod_51_disc_price'];
        $prod_51_quant = $_POST['prod_51_quant'];

        $prod_52_name = $_POST['prod_52_name'];
        $prod_52_price = $_POST['prod_52_disc_price'];
        $prod_52_quant = $_POST['prod_52_quant'];

        $prod_53_name = $_POST['prod_53_name'];
        $prod_53_price = $_POST['prod_53_disc_price'];
        $prod_53_quant = $_POST['prod_53_quant'];

        $prod_54_name = $_POST['prod_54_name'];
        $prod_54_price = $_POST['prod_54_disc_price'];
        $prod_54_quant = $_POST['prod_54_quant'];

        $prod_55_name = $_POST['prod_55_name'];
        $prod_55_price = $_POST['prod_55_disc_price'];
        $prod_55_quant = $_POST['prod_55_quant'];

        $prod_56_name = $_POST['prod_56_name'];
        $prod_56_price = $_POST['prod_56_disc_price'];
        $prod_56_quant = $_POST['prod_56_quant'];

        $prod_57_name = $_POST['prod_57_name'];
        $prod_57_price = $_POST['prod_57_disc_price'];
        $prod_57_quant = $_POST['prod_57_quant'];

        $prod_58_name = $_POST['prod_58_name'];
        $prod_58_price = $_POST['prod_58_disc_price'];
        $prod_58_quant = $_POST['prod_58_quant'];

        $prod_59_name = $_POST['prod_59_name'];
        $prod_59_price = $_POST['prod_59_disc_price'];
        $prod_59_quant = $_POST['prod_59_quant'];

        $prod_60_name = $_POST['prod_60_name'];
        $prod_60_price = $_POST['prod_60_disc_price'];
        $prod_60_quant = $_POST['prod_60_quant'];

        $prod_61_name = $_POST['prod_61_name'];
        $prod_61_price = $_POST['prod_61_disc_price'];
        $prod_61_quant = $_POST['prod_61_quant'];

        $prod_62_name = $_POST['prod_62_name'];
        $prod_62_price = $_POST['prod_62_disc_price'];
        $prod_62_quant = $_POST['prod_62_quant'];

        $prod_63_name = $_POST['prod_63_name'];
        $prod_63_price = $_POST['prod_63_disc_price'];
        $prod_63_quant = $_POST['prod_63_quant'];

        $prod_64_name = $_POST['prod_64_name'];
        $prod_64_price = $_POST['prod_64_disc_price'];
        $prod_64_quant = $_POST['prod_64_quant'];

        $prod_65_name = $_POST['prod_65_name'];
        $prod_65_price = $_POST['prod_65_disc_price'];
        $prod_65_quant = $_POST['prod_65_quant'];

        $prod_66_name = $_POST['prod_66_name'];
        $prod_66_price = $_POST['prod_66_disc_price'];
        $prod_66_quant = $_POST['prod_66_quant'];

        $prod_67_name = $_POST['prod_67_name'];
        $prod_67_price = $_POST['prod_67_disc_price'];
        $prod_67_quant = $_POST['prod_67_quant'];

        $prod_68_name = $_POST['prod_68_name'];
        $prod_68_price = $_POST['prod_68_disc_price'];
        $prod_68_quant = $_POST['prod_68_quant'];

        $prod_69_name = $_POST['prod_69_name'];
        $prod_69_price = $_POST['prod_69_disc_price'];
        $prod_69_quant = $_POST['prod_69_quant'];

        $prod_70_name = $_POST['prod_70_name'];
        $prod_70_price = $_POST['prod_70_disc_price'];
        $prod_70_quant = $_POST['prod_70_quant'];

        $prod_71_name = $_POST['prod_71_name'];
        $prod_71_price = $_POST['prod_71_disc_price'];
        $prod_71_quant = $_POST['prod_71_quant'];

        $prod_72_name = $_POST['prod_72_name'];
        $prod_72_price = $_POST['prod_72_disc_price'];
        $prod_72_quant = $_POST['prod_72_quant'];

        $prod_73_name = $_POST['prod_73_name'];
        $prod_73_price = $_POST['prod_73_disc_price'];
        $prod_73_quant = $_POST['prod_73_quant'];

        $prod_74_name = $_POST['prod_74_name'];
        $prod_74_price = $_POST['prod_74_disc_price'];
        $prod_74_quant = $_POST['prod_74_quant'];

        $prod_75_name = $_POST['prod_75_name'];
        $prod_75_price = $_POST['prod_75_disc_price'];
        $prod_75_quant = $_POST['prod_75_quant'];

        $prod_76_name = $_POST['prod_76_name'];
        $prod_76_price = $_POST['prod_76_disc_price'];
        $prod_76_quant = $_POST['prod_76_quant'];

        $prod_77_name = $_POST['prod_77_name'];
        $prod_77_price = $_POST['prod_77_disc_price'];
        $prod_77_quant = $_POST['prod_77_quant'];

        $prod_78_name = $_POST['prod_78_name'];
        $prod_78_price = $_POST['prod_78_disc_price'];
        $prod_78_quant = $_POST['prod_78_quant'];

        $prod_79_name = $_POST['prod_79_name'];
        $prod_79_price = $_POST['prod_79_disc_price'];
        $prod_79_quant = $_POST['prod_79_quant'];

        $prod_80_name = $_POST['prod_80_name'];
        $prod_80_price = $_POST['prod_80_disc_price'];
        $prod_80_quant = $_POST['prod_80_quant'];

        $prod_81_name = $_POST['prod_81_name'];
        $prod_81_price = $_POST['prod_81_disc_price'];
        $prod_81_quant = $_POST['prod_81_quant'];

        $prod_82_name = $_POST['prod_82_name'];
        $prod_82_price = $_POST['prod_82_disc_price'];
        $prod_82_quant = $_POST['prod_82_quant'];

        $prod_83_name = $_POST['prod_83_name'];
        $prod_83_price = $_POST['prod_83_disc_price'];
        $prod_83_quant = $_POST['prod_83_quant'];

        $prod_84_name = $_POST['prod_84_name'];
        $prod_84_price = $_POST['prod_84_disc_price'];
        $prod_84_quant = $_POST['prod_84_quant'];

        $prod_85_name = $_POST['prod_85_name'];
        $prod_85_price = $_POST['prod_85_disc_price'];
        $prod_85_quant = $_POST['prod_85_quant'];

        $prod_86_name = $_POST['prod_86_name'];
        $prod_86_price = $_POST['prod_86_disc_price'];
        $prod_86_quant = $_POST['prod_86_quant'];

        $prod_87_name = $_POST['prod_87_name'];
        $prod_87_price = $_POST['prod_87_disc_price'];
        $prod_87_quant = $_POST['prod_87_quant'];

        $prod_88_name = $_POST['prod_88_name'];
        $prod_88_price = $_POST['prod_88_disc_price'];
        $prod_88_quant = $_POST['prod_88_quant'];

        $prod_89_name = $_POST['prod_89_name'];
        $prod_89_price = $_POST['prod_89_disc_price'];
        $prod_89_quant = $_POST['prod_89_quant'];

        $prod_90_name = $_POST['prod_90_name'];
        $prod_90_price = $_POST['prod_90_disc_price'];
        $prod_90_quant = $_POST['prod_90_quant'];

        $prod_91_name = $_POST['prod_91_name'];
        $prod_91_price = $_POST['prod_91_disc_price'];
        $prod_91_quant = $_POST['prod_91_quant'];

        $prod_92_name = $_POST['prod_92_name'];
        $prod_92_price = $_POST['prod_92_disc_price'];
        $prod_92_quant = $_POST['prod_92_quant'];

        $prod_93_name = $_POST['prod_93_name'];
        $prod_93_price = $_POST['prod_93_disc_price'];
        $prod_93_quant = $_POST['prod_93_quant'];

        $prod_94_name = $_POST['prod_94_name'];
        $prod_94_price = $_POST['prod_94_disc_price'];
        $prod_94_quant = $_POST['prod_94_quant'];

        $prod_95_name = $_POST['prod_95_name'];
        $prod_95_price = $_POST['prod_95_disc_price'];
        $prod_95_quant = $_POST['prod_95_quant'];

        $prod_96_name = $_POST['prod_96_name'];
        $prod_96_price = $_POST['prod_96_disc_price'];
        $prod_96_quant = $_POST['prod_96_quant'];

        $prod_97_name = $_POST['prod_97_name'];
        $prod_97_price = $_POST['prod_97_disc_price'];
        $prod_97_quant = $_POST['prod_97_quant'];

        $prod_98_name = $_POST['prod_98_name'];
        $prod_98_price = $_POST['prod_98_disc_price'];
        $prod_98_quant = $_POST['prod_98_quant'];

        $prod_99_name = $_POST['prod_99_name'];
        $prod_99_price = $_POST['prod_99_disc_price'];
        $prod_99_quant = $_POST['prod_99_quant'];

        $prod_100_name = $_POST['prod_100_name'];
        $prod_100_price = $_POST['prod_100_disc_price'];
        $prod_100_quant = $_POST['prod_100_quant'];

        $prod_101_name = $_POST['prod_101_name'];
        $prod_101_price = $_POST['prod_101_disc_price'];
        $prod_101_quant = $_POST['prod_101_quant'];

        $prod_102_name = $_POST['prod_102_name'];
        $prod_102_price = $_POST['prod_102_disc_price'];
        $prod_102_quant = $_POST['prod_102_quant'];

        $prod_103_name = $_POST['prod_103_name'];
        $prod_103_price = $_POST['prod_103_disc_price'];
        $prod_103_quant = $_POST['prod_103_quant'];

        $prod_104_name = $_POST['prod_104_name'];
        $prod_104_price = $_POST['prod_104_disc_price'];
        $prod_104_quant = $_POST['prod_104_quant'];

        $prod_105_name = $_POST['prod_105_name'];
        $prod_105_price = $_POST['prod_105_disc_price'];
        $prod_105_quant = $_POST['prod_105_quant'];

        $prod_106_name = $_POST['prod_106_name'];
        $prod_106_price = $_POST['prod_106_disc_price'];
        $prod_106_quant = $_POST['prod_106_quant'];

        $prod_107_name = $_POST['prod_107_name'];
        $prod_107_price = $_POST['prod_107_disc_price'];
        $prod_107_quant = $_POST['prod_107_quant'];

        $prod_108_name = $_POST['prod_108_name'];
        $prod_108_price = $_POST['prod_108_disc_price'];
        $prod_108_quant = $_POST['prod_108_quant'];

        $prod_109_name = $_POST['prod_109_name'];
        $prod_109_price = $_POST['prod_109_disc_price'];
        $prod_109_quant = $_POST['prod_109_quant'];

        $prod_110_name = $_POST['prod_110_name'];
        $prod_110_price = $_POST['prod_110_disc_price'];
        $prod_110_quant = $_POST['prod_110_quant'];


        $prod_111_name = $_POST['prod_111_name'];
        $prod_111_price = $_POST['prod_111_disc_price'];
        $prod_111_quant = $_POST['prod_111_quant'];

        $prod_112_name = $_POST['prod_112_name'];
        $prod_112_price = $_POST['prod_112_disc_price'];
        $prod_112_quant = $_POST['prod_112_quant'];

        $prod_113_name = $_POST['prod_133_name'];
        $prod_113_price = $_POST['prod_113_disc_price'];
        $prod_113_quant = $_POST['prod_113_quant'];

        $prod_114_name = $_POST['prod_114_name'];
        $prod_114_price = $_POST['prod_114_disc_price'];
        $prod_114_quant = $_POST['prod_114_quant'];

        $prod_115_name = $_POST['prod_115_name'];
        $prod_115_price = $_POST['prod_115_disc_price'];
        $prod_115_quant = $_POST['prod_115_quant'];

        $prod_116_name = $_POST['prod_116_name'];
        $prod_116_price = $_POST['prod_116_disc_price'];
        $prod_116_quant = $_POST['prod_116_quant'];

        $prod_117_name = $_POST['prod_117_name'];
        $prod_117_price = $_POST['prod_117_disc_price'];
        $prod_117_quant = $_POST['prod_117_quant'];

        $prod_118_name = $_POST['prod_118_name'];
        $prod_118_price = $_POST['prod_118_disc_price'];
        $prod_118_quant = $_POST['prod_118_quant'];

        $prod_119_name = $_POST['prod_119_name'];
        $prod_119_price = $_POST['prod_119_disc_price'];
        $prod_119_quant = $_POST['prod_119_quant'];

        $prod_120_name = $_POST['prod_120_name'];
        $prod_120_price = $_POST['prod_120_disc_price'];
        $prod_120_quant = $_POST['prod_120_quant'];

        $prod_121_name = $_POST['prod_121_name'];
        $prod_121_price = $_POST['prod_121_disc_price'];
        $prod_121_quant = $_POST['prod_121_quant'];

        $prod_122_name = $_POST['prod_122_name'];
        $prod_122_price = $_POST['prod_122_disc_price'];
        $prod_122_quant = $_POST['prod_122_quant'];

        $prod_123_name = $_POST['prod_123_name'];
        $prod_123_price = $_POST['prod_123_disc_price'];
        $prod_123_quant = $_POST['prod_123_quant'];

        $prod_124_name = $_POST['prod_124_name'];
        $prod_124_price = $_POST['prod_124_disc_price'];
        $prod_124_quant = $_POST['prod_124_quant'];

        $prod_125_name = $_POST['prod_125_name'];
        $prod_125_price = $_POST['prod_125_disc_price'];
        $prod_125_quant = $_POST['prod_125_quant'];

        $prod_126_name = $_POST['prod_126_name'];
        $prod_126_price = $_POST['prod_126_disc_price'];
        $prod_126_quant = $_POST['prod_126_quant'];

        $prod_127_name = $_POST['prod_127_name'];
        $prod_127_price = $_POST['prod_127_disc_price'];
        $prod_127_quant = $_POST['prod_127_quant'];

        $prod_128_name = $_POST['prod_128_name'];
        $prod_128_price = $_POST['prod_128_disc_price'];
        $prod_128_quant = $_POST['prod_128_quant'];

        $prod_129_name = $_POST['prod_129_name'];
        $prod_129_price = $_POST['prod_129_disc_price'];
        $prod_129_quant = $_POST['prod_129_quant'];

        $prod_130_name = $_POST['prod_130_name'];
        $prod_130_price = $_POST['prod_130_disc_price'];
        $prod_130_quant = $_POST['prod_130_quant'];

        $prod_131_name = $_POST['prod_131_name'];
        $prod_131_price = $_POST['prod_131_disc_price'];
        $prod_131_quant = $_POST['prod_131_quant'];

        $prod_132_name = $_POST['prod_132_name'];
        $prod_132_price = $_POST['prod_132_disc_price'];
        $prod_132_quant = $_POST['prod_132_quant'];

        $prod_133_name = $_POST['prod_133_name'];
        $prod_133_price = $_POST['prod_133_disc_price'];
        $prod_133_quant = $_POST['prod_133_quant'];

        $prod_134_name = $_POST['prod_134_name'];
        $prod_134_price = $_POST['prod_134_disc_price'];
        $prod_134_quant = $_POST['prod_134_quant'];

        $prod_135_name = $_POST['prod_135_name'];
        $prod_135_price = $_POST['prod_135_disc_price'];
        $prod_135_quant = $_POST['prod_135_quant'];

        $prod_136_name = $_POST['prod_136_name'];
        $prod_136_price = $_POST['prod_136_disc_price'];
        $prod_136_quant = $_POST['prod_136_quant'];

        $prod_137_name = $_POST['prod_137_name'];
        $prod_137_price = $_POST['prod_137_disc_price'];
        $prod_137_quant = $_POST['prod_137_quant'];

        $prod_138_name = $_POST['prod_138_name'];
        $prod_138_price = $_POST['prod_138_disc_price'];
        $prod_138_quant = $_POST['prod_138_quant'];

        $prod_139_name = $_POST['prod_139_name'];
        $prod_139_price = $_POST['prod_139_disc_price'];
        $prod_139_quant = $_POST['prod_139_quant'];

        $prod_140_name = $_POST['prod_140_name'];
        $prod_140_price = $_POST['prod_140_disc_price'];
        $prod_140_quant = $_POST['prod_140_quant'];

        $prod_141_name = $_POST['prod_141_name'];
        $prod_141_price = $_POST['prod_141_disc_price'];
        $prod_141_quant = $_POST['prod_141_quant'];

        $prod_142_name = $_POST['prod_142_name'];
        $prod_142_price = $_POST['prod_142_disc_price'];
        $prod_142_quant = $_POST['prod_142_quant'];

        $prod_143_name = $_POST['prod_143_name'];
        $prod_143_price = $_POST['prod_143_disc_price'];
        $prod_143_quant = $_POST['prod_143_quant'];

        $prod_144_name = $_POST['prod_144_name'];
        $prod_144_price = $_POST['prod_144_disc_price'];
        $prod_144_quant = $_POST['prod_144_quant'];

        $prod_145_name = $_POST['prod_145_name'];
        $prod_145_price = $_POST['prod_145_disc_price'];
        $prod_145_quant = $_POST['prod_145_quant'];

        $prod_146_name = $_POST['prod_146_name'];
        $prod_146_price = $_POST['prod_146_disc_price'];
        $prod_146_quant = $_POST['prod_146_quant'];

        $prod_147_name = $_POST['prod_147_name'];
        $prod_147_price = $_POST['prod_147_disc_price'];
        $prod_147_quant = $_POST['prod_147_quant'];

        $prod_148_name = $_POST['prod_148_name'];
        $prod_148_price = $_POST['prod_148_disc_price'];
        $prod_148_quant = $_POST['prod_148_quant'];

        $prod_149_name = $_POST['prod_149_name'];
        $prod_149_price = $_POST['prod_149_disc_price'];
        $prod_149_quant = $_POST['prod_149_quant'];

        $prod_150_name = $_POST['prod_150_name'];
        $prod_150_price = $_POST['prod_150_disc_price'];
        $prod_150_quant = $_POST['prod_150_quant'];

        $prod_151_name = $_POST['prod_151_name'];
        $prod_151_price = $_POST['prod_151_disc_price'];
        $prod_151_quant = $_POST['prod_151_quant'];

        $prod_152_name = $_POST['prod_152_name'];
        $prod_152_price = $_POST['prod_152_disc_price'];
        $prod_152_quant = $_POST['prod_152_quant'];

        $prod_153_name = $_POST['prod_153_name'];
        $prod_153_price = $_POST['prod_153_disc_price'];
        $prod_153_quant = $_POST['prod_153_quant'];

        $prod_154_name = $_POST['prod_154_name'];
        $prod_154_price = $_POST['prod_154_disc_price'];
        $prod_154_quant = $_POST['prod_154_quant'];

        $prod_155_name = $_POST['prod_155_name'];
        $prod_155_price = $_POST['prod_155_disc_price'];
        $prod_155_quant = $_POST['prod_155_quant'];

        $prod_156_name = $_POST['prod_156_name'];
        $prod_156_price = $_POST['prod_156_disc_price'];
        $prod_156_quant = $_POST['prod_156_quant'];

        $prod_157_name = $_POST['prod_157_name'];
        $prod_157_price = $_POST['prod_157_disc_price'];
        $prod_157_quant = $_POST['prod_157_quant'];

        $prod_158_name = $_POST['prod_158_name'];
        $prod_158_price = $_POST['prod_158_disc_price'];
        $prod_158_quant = $_POST['prod_158_quant'];

        $prod_159_name = $_POST['prod_159_name'];
        $prod_159_price = $_POST['prod_159_disc_price'];
        $prod_159_quant = $_POST['prod_159_quant'];

        $prod_160_name = $_POST['prod_160_name'];
        $prod_160_price = $_POST['prod_160_disc_price'];
        $prod_160_quant = $_POST['prod_160_quant'];

        $prod_161_name = $_POST['prod_161_name'];
        $prod_161_price = $_POST['prod_161_disc_price'];
        $prod_161_quant = $_POST['prod_161_quant'];

        $prod_162_name = $_POST['prod_162_name'];
        $prod_162_price = $_POST['prod_162_disc_price'];
        $prod_162_quant = $_POST['prod_162_quant'];

        $prod_163_name = $_POST['prod_163_name'];
        $prod_163_price = $_POST['prod_163_disc_price'];
        $prod_163_quant = $_POST['prod_163_quant'];

        $prod_164_name = $_POST['prod_164_name'];
        $prod_164_price = $_POST['prod_164_disc_price'];
        $prod_164_quant = $_POST['prod_164_quant'];

        $prod_165_name = $_POST['prod_165_name'];
        $prod_165_price = $_POST['prod_165_disc_price'];
        $prod_165_quant = $_POST['prod_165_quant'];

        $prod_166_name = $_POST['prod_166_name'];
        $prod_166_price = $_POST['prod_166_disc_price'];
        $prod_166_quant = $_POST['prod_166_quant'];

        $prod_167_name = $_POST['prod_167_name'];
        $prod_167_price = $_POST['prod_167_disc_price'];
        $prod_167_quant = $_POST['prod_167_quant'];

        $prod_168_name = $_POST['prod_168_name'];
        $prod_168_price = $_POST['prod_168_disc_price'];
        $prod_168_quant = $_POST['prod_168_quant'];

        $prod_169_name = $_POST['prod_169_name'];
        $prod_169_price = $_POST['prod_169_disc_price'];
        $prod_169_quant = $_POST['prod_169_quant'];

        $prod_170_name = $_POST['prod_170_name'];
        $prod_170_price = $_POST['prod_170_disc_price'];
        $prod_170_quant = $_POST['prod_170_quant'];

        $prod_171_name = $_POST['prod_171_name'];
        $prod_171_price = $_POST['prod_171_disc_price'];
        $prod_171_quant = $_POST['prod_171_quant'];

        $prod_172_name = $_POST['prod_172_name'];
        $prod_172_price = $_POST['prod_172_disc_price'];
        $prod_172_quant = $_POST['prod_172_quant'];

        $prod_173_name = $_POST['prod_173_name'];
        $prod_173_price = $_POST['prod_173_disc_price'];
        $prod_173_quant = $_POST['prod_173_quant'];

        $prod_174_name = $_POST['prod_174_name'];
        $prod_174_price = $_POST['prod_174_disc_price'];
        $prod_174_quant = $_POST['prod_174_quant'];

        $prod_175_name = $_POST['prod_175_name'];
        $prod_175_price = $_POST['prod_175_disc_price'];
        $prod_175_quant = $_POST['prod_175_quant'];

        $prod_176_name = $_POST['prod_176_name'];
        $prod_176_price = $_POST['prod_176_disc_price'];
        $prod_176_quant = $_POST['prod_176_quant'];

        $prod_177_name = $_POST['prod_177_name'];
        $prod_177_price = $_POST['prod_177_disc_price'];
        $prod_177_quant = $_POST['prod_177_quant'];


        $prod_total = $_POST['prods_total'];
        // $prod_ftotal = $_POST['prods_ftotal'];
    
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h4 style="color:#00f;"> Name : '.$name.'</h4>';
    $message .= '<h4 style="color:#00f;"> Mobile : '.$mobile.'</h4>';
    $message .= '<h4 style="color:#00f;"> Email : '.$customer_email.'</h4>';
    $message .= '<p style="color:#00f;font-size:18px;">Address: '.$address.'</p>';
    $message.='<table class="table" id="items" style="border: 1px solid black; border-collapse: collapse;">
		
    <tr>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 10px;">Sl.no</th>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 10px;">Product</th>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 10px;">Unit Cost</th>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 10px;">Quantity</th>
        <th style="border: 1px solid black; border-collapse: collapse; padding: 10px;">Price</th>
    </tr>';

    $i = 0;

    if($prod_1_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  style="border: 1px solid black; border-collapse: collapse; padding: 10px;" class="item-name"><p>'.$prod_1_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_1_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_1_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_1_price)*$prod_1_quant.'</td>
    </tr>';
    }
    if($prod_2_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_2_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_2_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_2_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_2_price)*$prod_2_quant.'</td>
    </tr>';
    }
    if($prod_3_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_3_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_3_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_3_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_3_price)*$prod_3_quant.'</td>
    </tr>';
    }
    if($prod_4_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'. $prod_4_name .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_4_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_4_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_4_price)*$prod_4_quant.'</td>
    </tr>';
    }
    if($prod_5_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_5_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_5_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_5_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_5_price)*$prod_5_quant.'</td>
    </tr>';
    }
    if($prod_6_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_6_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_6_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_6_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_6_price)*$prod_6_quant.'</td>
    </tr>';
    }
    if($prod_7_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_7_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_7_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_7_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_7_price)*$prod_7_quant.'</td>
    </tr>';
    }
    if($prod_8_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_8_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_8_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_8_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_8_price)*$prod_8_quant.'</td>
    </tr>';
    }
    if($prod_9_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_9_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_9_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_9_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_9_price)*$prod_9_quant.'</td>
    </tr>';
    }
    if($prod_10_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'. $prod_10_name .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_10_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_10_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_10_price)*$prod_10_quant.'</td>
    </tr>';
    }
    if($prod_11_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_11_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_11_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_11_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_11_price)*$prod_11_quant.'</td>
    </tr>';
    }

    if($prod_12_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_12_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_12_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_12_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_12_price)*$prod_12_quant.'</td>
    </tr>';
    }
    if($prod_13_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_13_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_13_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_13_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_13_price)*$prod_13_quant.'</td>
    </tr>';
    }
    if($prod_14_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_14_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_14_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_14_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_14_price)*$prod_14_quant.'</td>
    </tr>';
    }
    if($prod_15_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_15_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_15_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_15_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_15_price)*$prod_15_quant.'</td>
    </tr>';
    }
    if($prod_16_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_16_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_16_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_16_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_16_price)*$prod_16_quant.'</td>
    </tr>';
    }
    if($prod_17_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_17_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_17_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_17_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_17_price)*$prod_17_quant.'</td>
    </tr>';
    }
    if($prod_18_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_18_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_18_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_18_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_18_price)*$prod_18_quant.'</td>
    </tr>';
    }
    if($prod_19_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_19_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_19_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_19_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_19_price)*$prod_19_quant.'</td>
    </tr>';
    }
    if($prod_20_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_20_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_20_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_20_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_20_price)*$prod_20_quant.'</td>
    </tr>';
    }

    if($prod_21_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_21_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_21_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_21_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_21_price)*$prod_21_quant.'</td>
    </tr>';
    }

    if($prod_22_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_22_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_22_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_22_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_22_price)*$prod_22_quant.'</td>
    </tr>';
    }
    if($prod_23_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_23_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_23_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_23_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_23_price)*$prod_23_quant.'</td>
    </tr>';
    }
    if($prod_24_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_24_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_24_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_24_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_24_price)*$prod_24_quant.'</td>
    </tr>';
    }
    if($prod_25_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_25_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_25_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_25_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_25_price)*$prod_25_quant.'</td>
    </tr>';
    }
    if($prod_26_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_26_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_26_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_26_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_26_price)*$prod_26_quant.'</td>
    </tr>';
    }
    if($prod_27_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_27_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_27_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_27_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_27_price)*$prod_27_quant.'</td>
    </tr>';
    }
    if($prod_28_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_28_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_28_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_28_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_28_price)*$prod_28_quant.'</td>
    </tr>';
    }
    if($prod_29_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_29_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_29_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_29_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_29_price)*$prod_29_quant.'</td>
    </tr>';
    }
    if($prod_30_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_30_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_30_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_30_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_30_price)*$prod_30_quant.'</td>
    </tr>';
    }

    if($prod_31_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_31_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_31_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_31_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_31_price)*$prod_31_quant.'</td>
    </tr>';
    }

    if($prod_32_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_32_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_32_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_32_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_32_price)*$prod_32_quant.'</td>
    </tr>';
    }
    if($prod_33_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_33_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_33_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_33_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_33_price)*$prod_33_quant.'</td>
    </tr>';
    }
    if($prod_34_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_34_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_34_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_34_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_34_price)*$prod_34_quant.'</td>
    </tr>';
    }
    if($prod_35_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_35_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_35_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_35_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_35_price)*$prod_35_quant.'</td>
    </tr>';
    }
    if($prod_36_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_36_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_36_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_36_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_36_price)*$prod_36_quant.'</td>
    </tr>';
    }
    if($prod_37_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_37_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_37_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_37_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_37_price)*$prod_37_quant.'</td>
    </tr>';
    }
    if($prod_38_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_38_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_38_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_38_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_38_price)*$prod_38_quant.'</td>
    </tr>';
    }
    if($prod_39_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_39_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_39_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_39_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_39_price)*$prod_39_quant.'</td>
    </tr>';
    }
    if($prod_40_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_40_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_40_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_40_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_40_price)*$prod_40_quant.'</td>
    </tr>';
    }

    if($prod_41_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_41_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_41_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_41_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_41_price)*$prod_41_quant.'</td>
    </tr>';
    }

    if($prod_42_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_42_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_42_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_42_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_42_price)*$prod_42_quant.'</td>
    </tr>';
    }
    if($prod_43_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_43_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_43_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_43_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_43_price)*$prod_43_quant.'</td>
    </tr>';
    }
    if($prod_44_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_44_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_44_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_44_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_44_price)*$prod_44_quant.'</td>
    </tr>';
    }
    if($prod_45_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_45_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_45_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_45_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_45_price)*$prod_45_quant.'</td>
    </tr>';
    }
    if($prod_46_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_46_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_46_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_46_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_46_price)*$prod_46_quant.'</td>
    </tr>';
    }
    if($prod_47_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_47_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_47_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_47_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_47_price)*$prod_47_quant.'</td>
    </tr>';
    }
    if($prod_48_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_48_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_48_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_48_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_48_price)*$prod_48_quant.'</td>
    </tr>';
    }
    if($prod_49_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_49_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_49_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_49_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_49_price)*$prod_49_quant.'</td>
    </tr>';
    }
    if($prod_50_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_50_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_50_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_50_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_50_price)*$prod_50_quant.'</td>
    </tr>';
    }


    if($prod_51_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_51_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_51_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_51_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_51_price)*$prod_51_quant.'</td>
    </tr>';
    }

    if($prod_52_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_52_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_52_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_52_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_52_price)*$prod_52_quant.'</td>
    </tr>';
    }
    if($prod_53_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_53_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_53_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_53_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_53_price)*$prod_53_quant.'</td>
    </tr>';
    }
    if($prod_54_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_54_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_54_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_54_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_54_price)*$prod_54_quant.'</td>
    </tr>';
    }
    if($prod_55_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_55_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_55_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_55_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_55_price)*$prod_55_quant.'</td>
    </tr>';
    }
    if($prod_56_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_56_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_56_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_56_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_56_price)*$prod_56_quant.'</td>
    </tr>';
    }
    if($prod_57_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_57_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_57_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_57_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_57_price)*$prod_57_quant.'</td>
    </tr>';
    }
    if($prod_58_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_58_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_58_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_58_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_58_price)*$prod_58_quant.'</td>
    </tr>';
    }
    if($prod_59_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_59_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_59_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_59_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_59_price)*$prod_59_quant.'</td>
    </tr>';
    }
    if($prod_60_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_60_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_60_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_60_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_60_price)*$prod_60_quant.'</td>
    </tr>';
    }

    if($prod_61_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_61_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_61_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_61_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_61_price)*$prod_61_quant.'</td>
    </tr>';
    }

    if($prod_62_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_62_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_62_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_62_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_62_price)*$prod_62_quant.'</td>
    </tr>';
    }
    if($prod_63_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_63_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_63_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_63_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_63_price)*$prod_63_quant.'</td>
    </tr>';
    }
    if($prod_64_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_64_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_64_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_64_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_64_price)*$prod_64_quant.'</td>
    </tr>';
    }
    if($prod_65_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_65_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_65_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_65_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_65_price)*$prod_65_quant.'</td>
    </tr>';
    }
    if($prod_66_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_66_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_66_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_66_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_66_price)*$prod_66_quant.'</td>
    </tr>';
    }
    if($prod_67_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_67_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_67_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_67_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_67_price)*$prod_67_quant.'</td>
    </tr>';
    }
    if($prod_68_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_68_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_68_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_68_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_68_price)*$prod_68_quant.'</td>
    </tr>';
    }
    if($prod_69_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_69_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_69_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_69_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_69_price)*$prod_69_quant.'</td>
    </tr>';
    }
    if($prod_70_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_70_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_70_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_70_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_70_price)*$prod_70_quant.'</td>
    </tr>';
    }

    if($prod_71_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_71_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_71_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_71_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_71_price)*$prod_71_quant.'</td>
    </tr>';
    }
    if($prod_72_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_72_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_72_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_72_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_72_price)*$prod_72_quant.'</td>
    </tr>';
    }
    if($prod_73_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_73_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_73_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_73_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_73_price)*$prod_73_quant.'</td>
    </tr>';
    }
    if($prod_74_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_74_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_74_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_74_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_74_price)*$prod_74_quant.'</td>
    </tr>';
    }
    if($prod_75_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_75_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_75_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_75_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_75_price)*$prod_75_quant.'</td>
    </tr>';
    }
    if($prod_76_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_76_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_76_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_76_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_76_price)*$prod_76_quant.'</td>
    </tr>';
    }
    if($prod_77_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_77_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_77_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_77_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_77_price)*$prod_77_quant.'</td>
    </tr>';
    }
    if($prod_78_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_78_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_78_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_78_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_78_price)*$prod_78_quant.'</td>
    </tr>';
    }
    if($prod_79_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_79_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_79_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_79_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_79_price)*$prod_79_quant.'</td>
    </tr>';
    }
    if($prod_80_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_80_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_80_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_80_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_80_price)*$prod_80_quant.'</td>
    </tr>';
    }

    if($prod_81_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_81_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_81_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_81_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_81_price)*$prod_81_quant.'</td>
    </tr>';
    }
    if($prod_82_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_82_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_82_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_82_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_82_price)*$prod_82_quant.'</td>
    </tr>';
    }
    if($prod_83_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_83_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_83_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_83_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_83_price)*$prod_83_quant.'</td>
    </tr>';
    }
    if($prod_84_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_84_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_84_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_84_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_84_price)*$prod_84_quant.'</td>
    </tr>';
    }
    if($prod_85_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_85_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_85_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_85_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_85_price)*$prod_85_quant.'</td>
    </tr>';
    }
    if($prod_86_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_86_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_86_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_86_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_86_price)*$prod_86_quant.'</td>
    </tr>';
    }
    if($prod_87_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_87_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_87_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_87_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_87_price)*$prod_87_quant.'</td>
    </tr>';
    }
    if($prod_88_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_88_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_88_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_88_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_88_price)*$prod_88_quant.'</td>
    </tr>';
    }
    if($prod_89_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_89_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_89_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_89_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_89_price)*$prod_89_quant.'</td>
    </tr>';
    }
    if($prod_90_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_90_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_90_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_90_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_90_price)*$prod_90_quant.'</td>
    </tr>';
    }
    if($prod_91_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_91_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_91_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_91_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_91_price)*$prod_91_quant.'</td>
    </tr>';
    }
    if($prod_92_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_92_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_92_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_92_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_92_price)*$prod_92_quant.'</td>
    </tr>';
    }
    if($prod_93_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_93_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_93_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_93_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_93_price)*$prod_93_quant.'</td>
    </tr>';
    }
    if($prod_94_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_94_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_94_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_94_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_94_price)*$prod_94_quant.'</td>
    </tr>'; 
    }
    if($prod_95_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_95_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_95_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_95_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_95_price)*$prod_95_quant.'</td>
    </tr>';
    }
    if($prod_96_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_96_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_96_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_96_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_96_price)*$prod_96_quant.'</td>
    </tr>';
    }
    if($prod_97_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_97_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_97_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_97_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_97_price)*$prod_97_quant.'</td>
    </tr>';
    }
    if($prod_98_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_98_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_98_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_98_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_98_price)*$prod_98_quant.'</td>
    </tr>';
    }
    if($prod_99_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_99_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_99_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_99_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_99_price)*$prod_99_quant.'</td>
    </tr>';
    }
    if($prod_100_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_100_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_100_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_100_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_100_price)*$prod_100_quant.'</td>
    </tr>';
    }
    if($prod_101_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_101_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_101_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_101_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_101_price)*$prod_101_quant.'</td>
    </tr>';
    }

    if($prod_102_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_102_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_102_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_102_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_102_price)*$prod_102_quant.'</td>
    </tr>';
    }
    if($prod_103_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_103_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_103_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_103_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_103_price)*$prod_103_quant.'</td>
    </tr>';
    }
    if($prod_104_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_104_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_104_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_104_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_104_price)*$prod_104_quant.'</td>
    </tr>';
    }
    if($prod_105_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_105_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_105_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_105_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_105_price)*$prod_105_quant.'</td>
    </tr>';
    }
    if($prod_106_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_106_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_106_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_106_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_106_price)*$prod_106_quant.'</td>
    </tr>';
    }
    if($prod_107_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_107_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_107_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_107_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_107_price)*$prod_107_quant.'</td>
    </tr>';
    }
    if($prod_108_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_108_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_108_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_108_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_108_price)*$prod_108_quant.'</td>
    </tr>';
    }
    if($prod_109_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_109_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_109_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_109_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_109_price)*$prod_109_quant.'</td>
    </tr>';
    }
    if($prod_110_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_110_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_110_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_110_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_110_price)*$prod_110_quant.'</td>
    </tr>';
    }
    if($prod_111_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_111_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_111_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_111_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_111_price)*$prod_111_quant.'</td>
    </tr>';
    }

    if($prod_112_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_112_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_112_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_112_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_112_price)*$prod_112_quant.'</td>
    </tr>';
    }
    if($prod_113_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_113_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_113_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_113_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_113_price)*$prod_113_quant.'</td>
    </tr>';
    }
    if($prod_114_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_114_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_114_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_114_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_114_price)*$prod_114_quant.'</td>
    </tr>';
    }
    if($prod_115_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_115_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_115_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_115_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_115_price)*$prod_115_quant.'</td>
    </tr>';
    }
    if($prod_116_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_116_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_116_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_116_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_116_price)*$prod_116_quant.'</td>
    </tr>';
    }
    if($prod_117_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_117_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_117_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_117_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_17_price)*$prod_117_quant.'</td>
    </tr>';
    }
    if($prod_118_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_118_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_118_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_118_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_118_price)*$prod_118_quant.'</td>
    </tr>';
    }
    if($prod_119_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_119_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_119_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_119_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_119_price)*$prod_119_quant.'</td>
    </tr>';
    }
    if($prod_120_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_120_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_120_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_120_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_120_price)*$prod_120_quant.'</td>
    </tr>';
    }

    if($prod_121_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_121_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_121_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_121_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_121_price)*$prod_121_quant.'</td>
    </tr>';
    }

    if($prod_122_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_122_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_122_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_122_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_122_price)*$prod_122_quant.'</td>
    </tr>';
    }
    if($prod_123_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_123_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_123_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_123_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_123_price)*$prod_123_quant.'</td>
    </tr>';
    }
    if($prod_124_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_124_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_124_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_124_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_124_price)*$prod_124_quant.'</td>
    </tr>';
    }
    if($prod_125_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_125_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_125_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_125_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_125_price)*$prod_125_quant.'</td>
    </tr>';
    }
    if($prod_126_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_126_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_126_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_126_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_126_price)*$prod_126_quant.'</td>
    </tr>';
    }
    if($prod_127_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_127_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_127__price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_127_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_127_price)*$prod_127_quant.'</td>
    </tr>';
    }
    if($prod_128_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_128_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_128_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_128_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_128_price)*$prod_128_quant.'</td>
    </tr>';
    }
    if($prod_129_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_129_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_129_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_129_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_129_price)*$prod_129_quant.'</td>
    </tr>';
    }
    if($prod_130_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_130_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_130_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_130_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_130_price)*$prod_130_quant.'</td>
    </tr>';
    }

    if($prod_131_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_131_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_131_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_131_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_131_price)*$prod_131_quant.'</td>
    </tr>';
    }

    if($prod_132_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_132_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_132_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_132_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_132_price)*$prod_132_quant.'</td>
    </tr>';
    }
    if($prod_133_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_133_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_133_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_133_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_133_price)*$prod_133_quant.'</td>
    </tr>';
    }
    if($prod_134_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_134_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_134_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_134_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_134_price)*$prod_134_quant.'</td>
    </tr>';
    }
    if($prod_135_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_135_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_135_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_135_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_135_price)*$prod_135_quant.'</td>
    </tr>';
    }
    if($prod_136_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_136_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_136_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_136_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_136_price)*$prod_136_quant.'</td>
    </tr>';
    }
    if($prod_137_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_137_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_137_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_137_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_137_price)*$prod_137_quant.'</td>
    </tr>';
    }
    if($prod_138_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_138_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_138_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_138_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_138_price)*$prod_138_quant.'</td>
    </tr>';
    }
    if($prod_139_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_139_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_139_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_139_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_139_price)*$prod_139_quant.'</td>
    </tr>';
    }
    if($prod_140_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_140_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_140_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_140_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_140_price)*$prod_140_quant.'</td>
    </tr>';
    }

    if($prod_141_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_141_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_141_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_141_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_141_price)*$prod_141_quant.'</td>
    </tr>';
    }

    if($prod_142_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_142_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_142_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_142_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_142_price)*$prod_142_quant.'</td>
    </tr>';
    }
    if($prod_143_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_143_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_143_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_143_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_143_price)*$prod_143_quant.'</td>
    </tr>';
    }
    if($prod_144_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_144_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_144_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_144_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_144_price)*$prod_144_quant.'</td>
    </tr>';
    }
    if($prod_145_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_145_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_145_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_145_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_145_price)*$prod_145_quant.'</td>
    </tr>';
    }
    if($prod_146_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_146_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_146_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_146_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_146_price)*$prod_146_quant.'</td>
    </tr>';
    }
    if($prod_147_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_147_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_147_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_147_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_147_price)*$prod_147_quant.'</td>
    </tr>';
    }
    if($prod_148_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_148_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_148_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_148_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_148_price)*$prod_148_quant.'</td>
    </tr>';
    }
    if($prod_149_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_149_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_149_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_149_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_149_price)*$prod_149_quant.'</td>
    </tr>';
    }
    if($prod_150_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_150_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_150_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_150_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_150_price)*$prod_150_quant.'</td>
    </tr>';
    }

    if($prod_151_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_151_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_151_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_151_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_151_price)*$prod_151_quant.'</td>
    </tr>';
    }

    if($prod_152_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_152_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_152_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_152_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_152_price)*$prod_152_quant.'</td>
    </tr>';
    }
    if($prod_153_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_153_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_153_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_153_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_153_price)*$prod_153_quant.'</td>
    </tr>';
    }
    if($prod_154_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_154_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_154_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_154_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_154_price)*$prod_154_quant.'</td>
    </tr>';
    }
    if($prod_155_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_155_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_155_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_155_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_155_price)*$prod_155_quant.'</td>
    </tr>';
    }
    if($prod_156_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_156_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_156_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_156_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_156_price)*$prod_156_quant.'</td>
    </tr>';
    }
    if($prod_157_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_157_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_157_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_157_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_157_price)*$prod_157_quant.'</td>
    </tr>';
    }
    if($prod_158_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_158_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_158_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_158_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_158_price)*$prod_158_quant.'</td>
    </tr>';
    }
    if($prod_159_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_159_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_159_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_159_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_159_price)*$prod_159_quant.'</td>
    </tr>';
    }
    if($prod_160_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_160_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_160_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_160_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_160_price)*$prod_160_quant.'</td>
    </tr>';
    }
    if($prod_161_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_161_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_161_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_161_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_161_price)*$prod_161_quant.'</td>
    </tr>';
    }

    if($prod_162_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_162_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_162_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_162_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_162_price)*$prod_162_quant.'</td>
    </tr>';
    }
    if($prod_163_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_163_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_163_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_163_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_163_price)*$prod_163_quant.'</td>
    </tr>';
    }
    if($prod_164_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>' . $i . '</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_164_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_164_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_164_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_164_price)*$prod_164_quant.'</td>
    </tr>';
    }
    if($prod_165_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_165_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_165_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_165_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_165_price)*$prod_165_quant.'</td>
    </tr>';
    }
    if($prod_166_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_166_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_166_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_166_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_166_price)*$prod_166_quant.'</td>
    </tr>';
    }
    if($prod_167_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_167_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_167_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_167_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_167_price)*$prod_167_quant.'</td>
    </tr>';
    }
    if($prod_168_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_168_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_168_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_168_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_168_price)*$prod_168_quant.'</td>
    </tr>';
    }
    if($prod_169_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_169_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_169_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_169_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_169_price)*$prod_169_quant.'</td>
    </tr>';
    }
    if($prod_170_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_170_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_170_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_170_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_170_price)*$prod_170_quant.'</td>
    </tr>';
    }
    if($prod_171_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_171_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_171_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_171_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_171_price)*$prod_171_quant.'</td>
    </tr>';
    }
    if($prod_172_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_172_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_172_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_172_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_172_price)*$prod_172_quant.'</td>
    </tr>';
    }
    if($prod_173_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_173_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_173_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_173_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_173_price)*$prod_173_quant.'</td>
    </tr>';
    }
    if($prod_174_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_174_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_174_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_174_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_174_price)*$prod_174_quant.'</td>
    </tr>';
    }
    if($prod_175_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_175_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_175_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_175_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_175_price)*$prod_175_quant.'</td>
    </tr>';
    }
    if($prod_176_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_176_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_176_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_176_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_176_price)*$prod_176_quant.'</td>
    </tr>';
    }
    if($prod_177_quant!=0){
        $i = $i+1;
        $message .= '<tr class="item-row"><td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-number"><p>'. $i .'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;"  class="item-name"><p>'.$prod_177_name.'</p></td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_177_price.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.$prod_177_quant.'</td>
        <td style="border: 1px solid black; border-collapse: collapse; padding: 10px;" >'.str_replace("Rs ","", $prod_177_price)*$prod_177_quant.'</td>
    </tr>';
    }


    $message .='<tr>
                    <td colspan="2" > </td>
                    <th colspan="2" align="right">Total: </th>
                    <td >'.$prod_total.'</td>
                </tr>';
                // <tr>

                //     <td colspan="2" > </td>
                //     <th colspan="2" align="right">Discount: </th>
                //     <td><div id="discount">10%</div></td>
                // </tr>

                // <tr>
                //     <td colspan="2" > </td>
                //     <th colspan="2" align="right">Final Amount: </th>
                //     <td >'.$prod_ftotal.'</td>
                // </tr>';
    $message .= '</table></body></html>';
    
    $to = $customer_email;
    $subject = "Your order from Sivakasi Crakers";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <order@sivakasicracker.com>' . "\r\n";
    $headers .= 'Cc: shivatraders6@gmail.com' . "\r\n";
    // $headers .= 'From: <order@sivakasicracker.com>' . "\r\n";
    // $headers .= 'Cc: nmvanshika@gmail.com' . "\r\n";


    //mail($to,$subject,$message,$headers);
    if (mail($to,$subject,$message,$headers))
    {

    header("Location: http://www.sivakasicracker.com/order-placed.php");
    exit();

    }
    else
    {
        echo 'Your order was failed.';
        echo 'Error in placing Order. Please try again or Contact us ' ;

    }
}
else
{
        header("Location: http://www.sivakasicracker.com/index.php");
        exit();


}
 ?>

    <style>
        html, body {
            height: 100%;
        }
        .parent {
            width: 100%;
            height: 100%;
            display: table;
            text-align: center;
        }
        .parent > .child {
            display: table-cell;
            vertical-align: middle;
        }
    </style>
   
    <body>
<html>