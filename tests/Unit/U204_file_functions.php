<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class U204_file_functions extends TestCase
{
    // 
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // is_dir  2
    public function test_is_dir(): void
    {
        // Mac, Linuxのみ。Windowsは失敗するかもしれん。
        $this->assertTrue(is_dir('/var'));
    }

    // is_file 13
    public function test_is_file(): void
    {
        // Mac, Linuxのみ。Windowsは失敗するかもしれん。
        $this->assertTrue(is_file('/etc/hosts'));
    }

    // file_exists 13
    public function test_file_exists(): void
    {
        // Mac, Linuxのみ。Windowsは失敗するかもしれん。
        $this->assertTrue(file_exists('/etc/hosts'));
    }

    // dirname 4
    public function test_dirname(): void
    {
        $r = dirname('/var/log/httpd/conf.d/vhost-www.conf');
        $this->assertSame('/var/log/httpd/conf.d', $r);
    }

    // basename  3
    public function test_basename(): void
    {
        $r = basename('/var/log/httpd/conf.d/vhost-www.conf');
        $this->assertSame('vhost-www.conf', $r);
    }

    // pathinfo  12
    public function test_pathinfo(): void
    {
        $path = '/var/log/httpd/conf.d/vhost-www.conf';

        $this->assertSame('/var/log/httpd/conf.d', pathinfo($path, PATHINFO_DIRNAME));
        $this->assertSame('vhost-www.conf', pathinfo($path, PATHINFO_BASENAME));
        $this->assertSame('conf', pathinfo($path, PATHINFO_EXTENSION));
        $this->assertSame('vhost-www', pathinfo($path, PATHINFO_FILENAME));
    }

    // parse_url 12
    public function test_parse_url(): void
    {
        $url = 'https://username:password@hostname.com:9090/path?arg=value#anchor';
        $this->assertSame('https', parse_url($url, PHP_URL_SCHEME));
        $this->assertSame('username', parse_url($url, PHP_URL_USER));
        $this->assertSame('password', parse_url($url, PHP_URL_PASS));
        $this->assertSame('hostname.com', parse_url($url, PHP_URL_HOST));
        $this->assertSame(9090, parse_url($url, PHP_URL_PORT));
        $this->assertSame('/path', parse_url($url, PHP_URL_PATH));
        $this->assertSame('arg=value', parse_url($url, PHP_URL_QUERY));
        $this->assertSame('anchor', parse_url($url, PHP_URL_FRAGMENT));
    }

    // parse_str 2
    public function test_parse_str(): void
    {
        parse_str("a=1&b=2&c=3&d[]=4&d[]=5", $r);

        $this->assertSame(["a" => "1", "b" => "2", "c" => "3", "d" => [0 => "4", 1 => "5",]], $r);
    }

    // file_get_contents 23
    public function test_file_get_contents_local_file(): void
    {
        $r = file_get_contents("/etc/hosts");
        $this->assertTrue(str_contains($r, '127.0.0.1'));
    }

    public function test_file_get_contents_web(): void
    {
        $r = file_get_contents("https://www.mir-ai.co.jp/");
        $this->assertTrue(str_contains($r, 'ミライエ'));
    }

    // file_put_contents 7
    public function test_file_put_contents_web(): void
    {
        $content = file_get_contents("https://www.mir-ai.co.jp/");
        $tmpfile = tempnam('/tmp', 'html');
        $r = file_put_contents($tmpfile, $content);
        unlink($tmpfile);

        $this->assertTrue($r > 0);
    }

    // tempnam
    public function test_tempnam(): void
    {
        $tmpfile = tempnam('/tmp', 'html');

        $this->assertTrue(str_contains($tmpfile, '/tmp'));
    }

    // mkdir 6
    public function test_mkdir(): void
    {
        $uniq = uniqid();
        $path = "/tmp/unittest/{$uniq}/subdir";
        $r = mkdir($path, 0777, true); // サブ階層も作成

        rmdir($path);
        $this->assertTrue($r);
    }

}

