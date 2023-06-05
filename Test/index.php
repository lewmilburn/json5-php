<?php

require_once __DIR__ . '/../JSON5.php';

$JSON5 = new JSON5();

$Test = array();

$Test["JSON"]["Test"] = "Standard JSON";
$Test["JSON"]["Input"] = file_get_contents(__DIR__ . '/JSON/Standard.json');
$Test["JSON"]["Output"] = $JSON5->Parse($Test["JSON"]["Input"]);

$Test["JSON5"]["Test"] = "JSON5 (All Features)";
$Test["JSON5"]["Input"] = file_get_contents(__DIR__ . '/JSON/JSON5.json5');
$Test["JSON5"]["Output"] = $JSON5->Parse($Test["JSON5"]["Input"]);

$Test["JSON5Comments"]["Test"] = "JSON5 (Comments)";
$Test["JSON5Comments"]["Input"] = file_get_contents(__DIR__ . '/JSON/Comments.json5');
$Test["JSON5Comments"]["Output"] = $JSON5->Parse($Test["JSON5Comments"]["Input"]);

$Test["JSON5TrailingLeadingDecimal"]["Test"] = "JSON5 (Trailing / Leading Decimal)";
$Test["JSON5TrailingLeadingDecimal"]["Input"] = file_get_contents(__DIR__ . '/JSON/TrailingLeadingDecimal.json5');
$Test["JSON5TrailingLeadingDecimal"]["Output"] = $JSON5->Parse($Test["JSON5TrailingLeadingDecimal"]["Input"]);

$Test["JSON5NaN"]["Test"] = "JSON5 (NaN values)";
$Test["JSON5NaN"]["Input"] = file_get_contents(__DIR__ . '/JSON/NaN.json5');
$Test["JSON5NaN"]["Output"] = $JSON5->Parse($Test["JSON5NaN"]["Input"]);

$Test["JSON5ExplicitPlus"]["Test"] = "JSON5 (Explicit plus sign)";
$Test["JSON5ExplicitPlus"]["Input"] = file_get_contents(__DIR__ . '/JSON/ExplicitPlus.json5');
$Test["JSON5ExplicitPlus"]["Output"] = $JSON5->Parse($Test["JSON5ExplicitPlus"]["Input"]);
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>JSON5-PHP Test</title>
        <style>
            body {
                font-family: sans-serif;
            }
            h1 {
                text-align: center;
            }
            .test {
                background-color: #eee;
                border: 1px solid #ccc;
                padding: 10px;
                display: flex;
            }
            .test-main {
                flex-grow: 2;
            }
            .test-type {
                color: #696969;
                font-size: 0.8rem;
            }
            .test-pass {
                color: #0a0;
                font-weight: bold;
                text-align: center;
            }
            .test-fail {
                color: #a00;
                font-weight: bold;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>JSON5-PHP Test</h1>
        <?php foreach ($Test as $Item) { ?>
        <div class="test">
            <div class="test-main">
                <h2><?= $Item["Test"]; ?></h2>
                <p>
                    <span class="test-type">Raw JSON5 Input:</span><br>
                    <strong><?php var_dump($Item["Input"]); ?></strong>
                </p>
                <p>
                    <span class="test-type">Raw JSON Output:</span><br>
                    <strong><?php var_dump(json_encode($Item["Output"])); ?></strong>
                </p>
                <p>
                    <span class="test-type">PHP Object Output:</span><br>
                    <strong><?php var_dump($Item["Output"]); ?></strong>
                </p>
            </div>
            <?php if ($Item["Output"] == null) { ?>
                <p class="test-fail">[FAIL]</p>
            <?php } else { ?>
                <p class="test-pass">[PASS]</p>
            <?php } ?>
        </div>
        <br>
        <?php } ?>
    </body>
</html>