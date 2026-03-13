<?php
// app/Helpers/LabHelper.php
// زيد في bootstrap/app.php أو في AppServiceProvider:
// require_once app_path('Helpers/LabHelper.php');

if (!function_exists('labTestInfo')) {
    function labTestInfo(string $test): array
    {
        $tests = [
            // ══ تحاليل الدم ══
            'تحليل دم كامل'           => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'صورة الدم الكاملة'       => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'فصيلة الدم'              => ['placeholder'=>'مثال: A+',       'unit'=>'',       'normal'=>'A/B/AB/O'],
            'سكر الدم'                => ['placeholder'=>'مثال: 5.2',      'unit'=>'mmol/L', 'normal'=>'3.9 – 6.1'],
            'سكر صائم'                => ['placeholder'=>'مثال: 4.8',      'unit'=>'mmol/L', 'normal'=>'3.9 – 5.6'],
            'HbA1c هيموغلوبين سكري'  => ['placeholder'=>'مثال: 5.4',      'unit'=>'%',      'normal'=>'< 5.7%'],
            'سرعة الترسيب'            => ['placeholder'=>'مثال: 12',       'unit'=>'mm/h',   'normal'=>'ذكر < 15 | أنثى < 20'],
            'بروتين سي التفاعلي'      => ['placeholder'=>'مثال: 0.3',      'unit'=>'mg/L',   'normal'=>'< 1.0'],
            // ══ وظائف الكلى ══
            'وظائف الكلى'             => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'كرياتينين'               => ['placeholder'=>'مثال: 80',       'unit'=>'µmol/L', 'normal'=>'62 – 115'],
            'يوريا'                   => ['placeholder'=>'مثال: 5.0',      'unit'=>'mmol/L', 'normal'=>'2.5 – 7.1'],
            'حمض اليوريك'             => ['placeholder'=>'مثال: 320',      'unit'=>'µmol/L', 'normal'=>'ذكر 210-420 | أنثى 150-350'],
            // ══ وظائف الكبد ══
            'وظائف الكبد'             => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'بيليروبين'               => ['placeholder'=>'مثال: 12',       'unit'=>'µmol/L', 'normal'=>'< 21'],
            'SGPT ناقلة أمين'         => ['placeholder'=>'مثال: 25',       'unit'=>'U/L',    'normal'=>'7 – 56'],
            'SGOT ناقلة أمين'         => ['placeholder'=>'مثال: 30',       'unit'=>'U/L',    'normal'=>'10 – 40'],
            'فوسفاتاز قلوية'          => ['placeholder'=>'مثال: 70',       'unit'=>'U/L',    'normal'=>'44 – 147'],
            // ══ الدهون ══
            'الدهون والكوليسترول'     => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'كوليسترول كلي'           => ['placeholder'=>'مثال: 4.8',      'unit'=>'mmol/L', 'normal'=>'< 5.2'],
            'HDL كوليسترول جيد'       => ['placeholder'=>'مثال: 1.3',      'unit'=>'mmol/L', 'normal'=>'> 1.0'],
            'LDL كوليسترول سيء'       => ['placeholder'=>'مثال: 2.8',      'unit'=>'mmol/L', 'normal'=>'< 3.4'],
            'ثلاثيات الغليسريد'        => ['placeholder'=>'مثال: 1.2',      'unit'=>'mmol/L', 'normal'=>'< 1.7'],
            // ══ هرمونات ══
            'هرمونات الغدة الدرقية'   => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'TSH'                     => ['placeholder'=>'مثال: 2.1',      'unit'=>'mIU/L',  'normal'=>'0.4 – 4.0'],
            'T3'                      => ['placeholder'=>'مثال: 1.8',      'unit'=>'nmol/L', 'normal'=>'1.2 – 2.8'],
            'T4'                      => ['placeholder'=>'مثال: 120',      'unit'=>'nmol/L', 'normal'=>'60 – 150'],
            // ══ بول ══
            'تحليل بول كامل'          => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'بروتين البول'            => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
            'سكر البول'               => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
            'كريات دم بيضاء بول'      => ['placeholder'=>'مثال: 3',        'unit'=>'/HPF',   'normal'=>'0 – 5'],
            // ══ براز ══
            'تحليل البراز'            => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'دم خفي في البراز'        => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
            // ══ أخرى ══
            'صورة الدم الكاملة CBC'   => ['placeholder'=>'مثال: طبيعي',   'unit'=>'',       'normal'=>'طبيعي'],
            'فيروس نقص المناعة HIV'   => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
            'التهاب الكبد B'          => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
            'التهاب الكبد C'          => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
            'فيروس كورونا COVID'      => ['placeholder'=>'مثال: سلبي',     'unit'=>'',       'normal'=>'سلبي'],
        ];

        return $tests[$test] ?? [
            'placeholder' => 'أدخل النتيجة',
            'unit'        => '',
            'normal'      => 'راجع المرجع',
        ];
    }
}