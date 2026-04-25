<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the sessions table with initial data.
     */
    public function run()
    {
        DB::table('sessions')->insert([
            [
                'id' => 'AWKxl0GYcXWddiqSq50TwjUs5G7NiUpx2SzSRxR8',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36',
                'payload' => 'eyJfdG9rZW4iOiJJc3hjZng1cTd3eTVsblo1WFdLNFFsQVV4c2hyaUVmYUpubmdhZUx1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJsYW5kaW5nIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',
                'last_activity' => 1776905179
            ],
            [
                'id' => 'bvFuYsXD7LbfA4KFctph2IfSWVtm9Vne4bXZzBLC',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36',
                'payload' => 'eyJfdG9rZW4iOiJlQWJYRE91VlM1cjNna1NhYnZ2QXY3VlN6Vlpia2xKY2M1VDVEdENZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJsYW5kaW5nIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',
                'last_activity' => 1776817620
            ],
            [
                'id' => 'NtJkfSU5cMGQrb8p9jh0U1HpHEVn4w3OgAggvk52',
                'user_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36',
                'payload' => 'eyJfdG9rZW4iOiJqYktoOTYyU0tQQmdKdWZHcUdYVFFQUWRYWGF5dHlzMHR4d1Bld25PIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NvdXJzZXNcL2dpdGh1Yi02OWQyMjc5MDU5ZGJiXC9jZXJ0aWZpY2F0ZSIsInJvdXRlIjoiY2VydGlmaWNhdGVzLnNob3cifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',
                'last_activity' => 1776675793
            ],
            [
                'id' => 'x1NLJcy5KKPHqxbIMZnoBxJctXieLVBUsELX31Dk',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36',
                'payload' => 'eyJfdG9rZW4iOiJNbmZVSGZiaHhHSGRUWHQxTFBQVzFHTHJRNDFDQmRWREluSlJweHhwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jb3Vyc2VzIiwicm91dGUiOiJjb3Vyc2VzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',
                'last_activity' => 1776920537
            ]
        ]);
    }
}