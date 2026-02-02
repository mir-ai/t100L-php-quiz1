<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

// ファイルシステム関数
// https://www.php.net/manual/ja/ref.filesystem.php
class U220FileFunctionsTest extends TestCase
{
    //
    public function test_220_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // is_dir  2
    public function test_220_020_is_dir(): void
    {
        // Mac, Linuxのみ。Windowsは失敗するかもしれん。
        $this->assertTrue(is_dir('/var'));
    }

    // is_file 13
    public function test_220_030_is_file(): void
    {
        // Mac, Linuxのみ。Windowsは失敗するかもしれん。
        $this->assertTrue(is_file('/etc/hosts'));
    }

    // file_exists 13
    public function test_220_040_file_exists(): void
    {
        // Mac, Linuxのみ。Windowsは失敗するかもしれん。
        $this->assertTrue(file_exists('/etc/hosts'));
    }

    // dirname 4
    public function test_220_050_dirname(): void
    {
        $actual = dirname('/var/log/httpd/conf.d/vhost-www.conf');
        $this->assertSame('/var/log/httpd/conf.d', $actual);
    }

    // basename  3
    public function test_220_060_basename(): void
    {
        $actual = basename('/var/log/httpd/conf.d/vhost-www.conf');
        $this->assertSame('vhost-www.conf', $actual);
    }

    // pathinfo  12
    public function test_220_070_pathinfo(): void
    {
        $path = '/var/log/httpd/conf.d/vhost-www.conf';

        $this->assertSame('/var/log/httpd/conf.d', pathinfo($path, PATHINFO_DIRNAME));
        $this->assertSame('vhost-www.conf', pathinfo($path, PATHINFO_BASENAME));
        $this->assertSame('conf', pathinfo($path, PATHINFO_EXTENSION));
        $this->assertSame('vhost-www', pathinfo($path, PATHINFO_FILENAME));
    }

    // parse_url 12
    public function test_220_080_parse_url(): void
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
    public function test_220_090_parse_str(): void
    {
        parse_str("a=1&b=2&c=3&d[]=4&d[]=5", $actual);

        $this->assertSame(["a" => "1", "b" => "2", "c" => "3", "d" => [0 => "4", 1 => "5",]], $actual);
    }

    // file_get_contents 23
    public function test_220_100_file_get_contents_local_file(): void
    {
        $actual = file_get_contents("/etc/hosts");
        $this->assertTrue(str_contains($actual, '127.0.0.1'));
    }

    public function test_220_110_file_get_contents_web(): void
    {
        $actual = file_get_contents("https://www.mir-ai.co.jp/");
        $this->assertTrue(str_contains($actual, 'ミライエ'));
    }

    // file_put_contents 7
    public function test_220_120_file_put_contents_web(): void
    {
        $content = file_get_contents("https://www.mir-ai.co.jp/");
        $tmpfile = tempnam('/tmp', 'html');
        $actual = file_put_contents($tmpfile, $content);
        unlink($tmpfile);

        $this->assertTrue($actual > 0);
    }

    // tempnam
    public function test_220_130_tempnam(): void
    {
        $tmpfile = tempnam('/tmp', 'html');

        $this->assertTrue(str_contains($tmpfile, '/tmp'));
    }

    // mkdir 6
    public function test_220_140_mkdir(): void
    {
        $uniq = uniqid();
        $path = "/tmp/unittest/{$uniq}/subdir";
        $actual = mkdir($path, 0777, true); // サブ階層も作成

        rmdir($path);
        $this->assertTrue($actual);
    }

    public function test_220_150_fetch_jma_xml(): void
    {
        $url = 'https://www.data.jma.go.jp/developer/xml/feed/extra.xml';
        $xml = '';

        // $urlからコンテンツを取得して $xml 変数に入れて下さい。
        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertTrue(str_contains($xml, '<title>気象特別警報・警報・注意報</title>'));
    }

    public function test_220_160_fetche(): void
    {
        $tmpfile = tempnam('/tmp', 'xml');
        $content = 'THIS IS UNITTEST TEXT.';

        // $tmpfile に $contentを保存して下さい。
        // QUIZ
		$expected = null;
        // /QUIZ

        $c = file_get_contents($tmpfile);
        $this->assertTrue(str_contains($c, $content));
    }

    public function test_220_170_read_tsv(): void
    {
        // 各データがタブ(\t)で区切られた TSV ファイルの読み込みサンプル
        $filename = 'tests/Unit/data/gomi_items_small_utf8.tsv';
        $contents = file_get_contents($filename);
        if (! $contents) {
            echo "{$filename} を読み込めません。";
        }

        // ファイルから各項目を読んで取得する
        $lines = explode("\n", $contents);
        $col_names = [];
        $all_items = []; // 2次元配列。
        foreach ($lines as $no => $line) {
            if (! $line) {
                continue;
            }
            $line = trim($line);
            $cols = explode("\t", $line);

            if ($no == 0) {
                $col_names = $cols;
                continue;
            }

            $item = [];
            foreach ($col_names as $x => $col_name) {
                $item[$col_name] = $cols[$x] ?? '';
            }
            $all_items[] = $item;

            if ($no >= 3) {
                // ３行分しか読まない
                break;
            }
        }

        $actual = $all_items;

        $expected = [
            [
                "行" => "あ",
                "品目" => "IHクッキングヒーター",
                "詳細" => "一口型",
                "大きさ・長さ" => "60cm以上",
                "分別品目" => "連絡ごみ",
                "処理手数料" => "310円",
                "連絡ごみ備考" => "【長さ60cm未満のもの】や【長さ60cm未満に分解や解体したもの】は、「もえるごみ」・「もえないごみ」に分別して出すことができます。",
                "排出方法･備考" => "",
                "URLに関連するワード" => "",
                "浜松市公式Webサイト\u{3000}参考ページURL" => "",
                "分別品目の補足" => "",
                "NO" => "2",
            ],
            [
                "行" => "う",
                "品目" => "ウォーターベッド",
                "詳細" => "",
                "大きさ・長さ" => "60cm以上",
                "分別品目" => "連絡ごみ",
                "処理手数料" => "1240円",
                "連絡ごみ備考" => "【長さ60cm未満のもの】や【長さ60cm未満に分解や解体したもの】は、「もえるごみ」・「もえないごみ」に分別して出すことができます。",
                "排出方法･備考" => "水を抜いたものに限る",
                "URLに関連するワード" => "",
                "浜松市公式Webサイト\u{3000}参考ページURL" => "",
                "分別品目の補足" => "",
                "NO" => "91",
            ],
            [
                "行" => "お",
                "品目" => "折りたたみベッド",
                "詳細" => "",
                "大きさ・長さ" => "大小問わず",
                "分別品目" => "連絡ごみ",
                "処理手数料" => "1240円",
                "連絡ごみ備考" => "",
                "排出方法･備考" => "",
                "URLに関連するワード" => "",
                "浜松市公式Webサイト\u{3000}参考ページURL" => "",
                "分別品目の補足" => "",
                "NO" => "160",
            ]
        ];

        $this->assertSame($expected, $all_items);
    }

    // カンマで区切られたファイルの読み込みサンプル
    public function test_220_180_read_csv(): void
    {
        // 元データを読み込む
        $filename = 'tests/Unit/data/events_utf8.csv';
        $is_first = true;
        $col_names = [];
        $all_items = [];
        $actual = null;

        $count = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($cols = fgetcsv(stream: $handle, escape: ",")) !== false) {
                if ($is_first) {
                    $col_names = $cols;
                    $is_first = false;
                } else {
                    $item = [];
                    foreach ($col_names as $x => $col_name) {
                        $item[$col_name] = $cols[$x] ?? '';
                    }
                    $all_items[] = $item;

                    $count++;

                    if ($count >= 3) {
                        break;
                    }
                }
                $is_first = false;
            }
            fclose($handle);
        } else {
            echo "{$filename}を読み込めませんでした。";
        }

        $actual = $all_items;
        $expected = [
            [
                "都道府県コード又は市区町村コード" => "221309",
                "NO" => "20240913501",
                "都道府県名" => "静岡県",
                "市区町村名" => "浜松市",
                "イベント名" => "天竜壬生ホールの一部予約停止について",
                "イベント名_カナ" => "",
                "イベント名_英語" => "",
                "開始日" => "2026-01-13",
                "終了日" => "2026-04-13",
                "開始時間" => "",
                "終了時間" => "",
                "開始日時特記事項" => "予約停止期間は予定です。",
                "説明" => "【内容】設備改修工事等により予約の一部を停止します。",
                "料金(基本)" => "",
                "料金(詳細)" => "",
                "連絡先名称" => "工事に関すること\u{3000}天竜区まちづくり推進課\u{3000}（053）922-0086\n施設利用に関すること\u{3000}浜松市天竜壬生ホール\u{3000}（053）922-3301",
                "連絡先電話番号" => "",
                "連絡先内線番号" => "",
                "主催者" => "",
                "場所名称" => "浜松市天竜壬生ホール",
                "住所" => "浜松市天竜区二俣町二俣20-2",
                "方書" => "",
                "緯度" => "34.858793",
                "経度" => "137.815750",
                "アクセス方法" => "",
                "駐車場情報" => "",
                "定員" => "",
                "参加申込終了日" => "",
                "参加申込終了時間" => "",
                "参加申込方法" => "申込不要",
                "URL" => "https://www.city.hamamatsu.shizuoka.jp/tn-machi/20240910.html",
                "備考" => "",
                "カテゴリー" => "おしらせ",
                "区" => "天竜区",
                "公開日" => "2024-09-25",
                "更新日" => "2024-10-09",
                "子育て情報" => "",
                "施設No." => "001989_00",
            ],
            [
                "都道府県コード又は市区町村コード" => "221309",
                "NO" => "20241106070",
                "都道府県名" => "静岡県",
                "市区町村名" => "浜松市",
                "イベント名" => "楽器博物館の休館について",
                "イベント名_カナ" => "ガッキハクブツカンノキュウカンニツイテ",
                "イベント名_英語" => "",
                "開始日" => "2025-12-01",
                "終了日" => "2026-07-10",
                "開始時間" => "",
                "終了時間" => "",
                "開始日時特記事項" => "",
                "説明" => "【内容】施設の改修工事のため、楽器博物館は休館します",
                "料金(基本)" => "",
                "料金(詳細)" => "",
                "連絡先名称" => "創造都市・文化振興課",
                "連絡先電話番号" => "(053)457-2417",
                "連絡先内線番号" => "",
                "主催者" => "",
                "場所名称" => "浜松市楽器博物館",
                "住所" => "浜松市中央区中央三丁目9-1",
                "方書" => "",
                "緯度" => "34.706816",
                "経度" => "137.738256",
                "アクセス方法" => "",
                "駐車場情報" => "",
                "定員" => "",
                "参加申込終了日" => "",
                "参加申込終了時間" => "",
                "参加申込方法" => "",
                "URL" => "https://www.city.hamamatsu.shizuoka.jp/bunka/act-info_riyou-kyushi.html",
                "備考" => "",
                "カテゴリー" => "おしらせ",
                "区" => "中央区",
                "公開日" => "2024-11-19",
                "更新日" => "",
                "子育て情報" => "×",
                "施設No." => "000017_00",
            ]
        ];

        $this->assertSame($expected, $actual);

    }
}
