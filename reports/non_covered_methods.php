<?php

$xml = simplexml_load_file(__DIR__.'/clover.xml');

$metrics = $xml->xpath('//metrics');
$totalElements = $totalMethods = $totalStatements = 0;
$checkedElements = $checkedMethods = $checkedStatements = 0;

foreach ($metrics as $metric) {
    $totalElements += (int) $metric['elements'];
    $totalMethods += (int) $metric['methods'];
    $totalStatements += (int) $metric['statements'];
    $checkedElements += (int) $metric['coveredelements'];
    $checkedMethods += (int) $metric['coveredmethods'];
    $checkedStatements += (int) $metric['coveredstatements'];
}

$coverageElements = round(($checkedElements / $totalElements) * 100, 3);
$coverageMethods = round(($checkedElements / $totalElements) * 100, 3);
$coverageStatements = round(($checkedStatements / $totalStatements) * 100, 3);

echo '== OVERVIEW ========================================='.PHP_EOL.PHP_EOL;
echo ' - TOTAL ELEMENTS: '.$totalElements.PHP_EOL;
echo ' - CHECKED ELEMENTS: '.$checkedElements.PHP_EOL;
echo ' - ELEMENT COVERAGE: '.$coverageElements.'%'.PHP_EOL.PHP_EOL;
echo ' - TOTAL METHODS: '.$totalMethods.PHP_EOL;
echo ' - CHECKED METHODS: '.$checkedMethods.PHP_EOL;
echo ' - METHODS COVERAGE: '.$coverageMethods.'%'.PHP_EOL.PHP_EOL;
echo ' - TOTAL STATEMENTS: '.$totalElements.PHP_EOL;
echo ' - CHECKED STATEMENTS: '.$checkedElements.PHP_EOL;
echo ' - STATEMENTS COVERAGE: '.$coverageStatements.'%'.PHP_EOL.PHP_EOL;
echo '== BREAKDOWN ========================================'.PHP_EOL.PHP_EOL;

$counter = 0;
foreach ($xml->project->package as $package) {

    foreach ($package->file as $file) {
        $counter++;

        $needsMoreTests = (int)$file->metrics->attributes()['coveredmethods'] < (int)$file->metrics->attributes()['methods'];
        echo (string)$file->class->attributes()['name'] . ': ';
        echo ($needsMoreTests ? 'NEEDS MORE TESTS' : 'OK');
        echo ' (' . $file->metrics->attributes()['methods'] . ' methods, ' . $file->metrics->attributes()['coveredmethods'] . ' covered)'.PHP_EOL;

        if ($needsMoreTests) {
            foreach ($file->line as $line) {
                if (
                    (string)$line->attributes()['type'] == 'method' &&
                    (int)$line->attributes()['count'] === 0
                ) {
                    echo ' - '.(string)$line->attributes()['name'].PHP_EOL;
                }
            }
        }
    }
}