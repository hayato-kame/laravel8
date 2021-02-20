<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function __invoke() {
        return <<<EOF
        <html>
        <head>
        <title>Hello</title>
        <style>
        body {font-size:16pt; color:#999; }
        h1 { font-size:30pt; text-align:right; color:#eee;
          margin:-15px 0px 0px 0px; }
        </style>
        </head>
        <body>
          <h1>Single Action</h1>
          <p>これは、シングルアクションコントローラのアクションです。</p>
        </body>
        </html>
EOF;

    }
}
