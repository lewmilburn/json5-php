<?php

require_once __DIR__ . '/../JSON5.php';

$JSON5 = new JSON5();

$ParsedJSON5 = $JSON5->Parse(file_get_contents('example.json5'));
$ParsedJSON = $JSON5->Parse(file_get_contents('example.json'));
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
            .output {
                background-color: #eee;
                border: 1px solid #ccc;
                padding: 10px;
                display: flex;
            }
            .output-json {
                flex-grow: 2;
            }
            .output-title {
                color: #696969;
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
        <div class="output">
            <div class="output-json">
                <sup class="output-title">JSON5:</sup><br>
                <strong><?php var_dump($ParsedJSON5); ?></strong>
            </div>
            <?php if ($ParsedJSON5 == null) { ?>
                <p class="test-fail">[FAIL]</p>
            <?php } else { ?>
                <p class="test-pass">[PASS]</p>
            <?php } ?>
        </div>
        <br>
        <div class="output">
            <div class="output-json">
                <sup class="output-title">Standard JSON:</sup><br>
                <strong><?php var_dump($ParsedJSON); ?></strong>
            </div>
            <?php if ($ParsedJSON == null) { ?>
                <p class="test-fail">[FAIL]</p>
            <?php } else { ?>
                <p class="test-pass">[PASS]</p>
            <?php } ?>
        </div>
    </body>
</html>