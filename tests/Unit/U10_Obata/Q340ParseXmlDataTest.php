<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class Q340ParseXmlDataTest extends TestCase
{
    //
    public function test_340_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // クイズ： getInput() のテキストから、 getReportTable() の配列を作成して下さい。
    // これが入力データの配列
    private function getInput(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><Report xmlns="http://xml.kishou.go.jp/jmaxml1/" xmlns:jmx="http://xml.kishou.go.jp/jmaxml1/" xmlns:jmx_add="http://xml.kishou.go.jp/jmaxml1/addition1/"><Control><Title>気象警報・注意報（Ｈ２７）</Title><DateTime>2016-07-15T07:08:44Z</DateTime><Status>通常</Status><EditorialOffice>横浜地方気象台</EditorialOffice><PublishingOffice>横浜地方気象台</PublishingOffice></Control><Head xmlns="http://xml.kishou.go.jp/jmaxml1/informationBasis1/"><Title>神奈川県気象警報・注意報</Title><ReportDateTime>2016-07-15T16:03:00+09:00</ReportDateTime><TargetDateTime>2016-07-15T16:03:00+09:00</TargetDateTime><EventID /><InfoType>発表</InfoType><Serial /><InfoKind>気象警報・注意報</InfoKind><InfoKindVersion>1.2_0</InfoKindVersion></Head><Body xmlns="http://xml.kishou.go.jp/jmaxml1/body/meteorology1/" xmlns:jmx_eb="http://xml.kishou.go.jp/jmaxml1/elementBasis1/"><Warning type="気象警報・注意報（市町村等）"><Item><Kind><Name>波浪警報</Name><Code>07</Code><Status>発表</Status></Kind><Kind><Name>強風注意報</Name><Code>15</Code><Status>発表</Status></Kind><Area><Name>横須賀市</Name><Code>1420100</Code></Area></Item><Item><Kind><Name>波浪警報</Name><Code>07</Code><Status>発表</Status></Kind><Area><Name>平塚市</Name><Code>1420300</Code></Area></Item></Warning></Body></Report>';
    }

    // これを作りたい
    private function getOutput(): array
    {
        return [
            'report_date_time' => '2016-07-15T16:03:00+09:00',
            'items' => [
                [
                    'city_code' => '1420100',
                    'city_name' => '横須賀市',
                    'warnings' => [
                        [
                            'name' => '波浪警報',
                            'code' => '07',
                            'status' => '発表',
                        ],
                        [
                            'name' => '強風注意報',
                            'code' => '15',
                            'status' => '発表',
                        ]
                    ]
                ],
                [
                    'city_code' => '1420300',
                    'city_name' => '平塚市',
                    'warnings' => [
                        [
                            'name' => '波浪警報',
                            'code' => '07',
                            'status' => '発表',
                        ]
                    ]
                ]
            ],
        ];
    }

    // 要素分解１: XMLデータを整形する
    public function test_340_02_format_xml()
    {
        // 元データを取得する
        $xml_raw = $this->getInput();

        // XMLを整形する
        // ... 改行を全部消す。
        $xml_tmp = str_replace(["\n", "\r"], "", $xml_raw);

        // ... > <間のスペースを除去する。
        $xml_tmp = preg_replace('/>[\s]+</', '><', $xml_tmp);

        // ... そうすると、きれいにインデントされた、１行１ノードのXMLに整形してくれる。
        $simpleXmlElement = new SimpleXMLElement($xml_tmp);
        $dom = dom_import_simplexml($simpleXmlElement)->ownerDocument;
        $dom->formatOutput = true;
        $xml_formatted = $dom->saveXML();

        $a = <<<END
<?xml version="1.0" encoding="UTF-8"?>
<Report xmlns="http://xml.kishou.go.jp/jmaxml1/" xmlns:jmx="http://xml.kishou.go.jp/jmaxml1/" xmlns:jmx_add="http://xml.kishou.go.jp/jmaxml1/addition1/">
  <Control>
    <Title>気象警報・注意報（Ｈ２７）</Title>
    <DateTime>2016-07-15T07:08:44Z</DateTime>
    <Status>通常</Status>
    <EditorialOffice>横浜地方気象台</EditorialOffice>
    <PublishingOffice>横浜地方気象台</PublishingOffice>
  </Control>
  <Head xmlns="http://xml.kishou.go.jp/jmaxml1/informationBasis1/">
    <Title>神奈川県気象警報・注意報</Title>
    <ReportDateTime>2016-07-15T16:03:00+09:00</ReportDateTime>
    <TargetDateTime>2016-07-15T16:03:00+09:00</TargetDateTime>
    <EventID/>
    <InfoType>発表</InfoType>
    <Serial/>
    <InfoKind>気象警報・注意報</InfoKind>
    <InfoKindVersion>1.2_0</InfoKindVersion>
  </Head>
  <Body xmlns="http://xml.kishou.go.jp/jmaxml1/body/meteorology1/" xmlns:jmx_eb="http://xml.kishou.go.jp/jmaxml1/elementBasis1/">
    <Warning type="気象警報・注意報（市町村等）">
      <Item>
        <Kind>
          <Name>波浪警報</Name>
          <Code>07</Code>
          <Status>発表</Status>
        </Kind>
        <Kind>
          <Name>強風注意報</Name>
          <Code>15</Code>
          <Status>発表</Status>
        </Kind>
        <Area>
          <Name>横須賀市</Name>
          <Code>1420100</Code>
        </Area>
      </Item>
      <Item>
        <Kind>
          <Name>波浪警報</Name>
          <Code>07</Code>
          <Status>発表</Status>
        </Kind>
        <Area>
          <Name>平塚市</Name>
          <Code>1420300</Code>
        </Area>
      </Item>
    </Warning>
  </Body>
</Report>

END;

        $this->assertSame($a, $xml_formatted);
    }

    // 要素分解２: 文字列中から、タグで囲まれた範囲を抽出する
    public function test_340_03_extract_content()
    {
        $v = '<ReportDateTime>2016-07-15T16:03:00+09:00</ReportDateTime>';

        $r = '';
        if (preg_match('/<ReportDateTime>([\S\s]+?)<\/ReportDateTime>/', $v, $matches)) {
            $r = $matches[1];
        }

        $a = '2016-07-15T16:03:00+09:00';

        $this->assertSame($a, $r);
    }

    // 要素分解４: XML構造の中から、意味を読み取る
    public function test_340_04_read_from_struct()
    {
        $xml = <<<END
<Item>
  <Kind>
    <Name>わんこ警報</Name>
  </Kind>
  <Kind>
    <Name>にゃんこ警報</Name>
  </Kind>
  <Area>
    <Name>みらい市</Name>
  </Area>
</Item>
<Item>
  <Kind>
    <Name>かえる警報</Name>
  </Kind>
  <Area>
    <Name>かこ市</Name>
  </Area>
</Item>
END;

        $is_in_item = false;
        $item_mode = '';
        $items = [];
        $current_warnings = [];
        $current_warning = [];
        $current_city = [];

        $lines = explode("\n", $xml);
        foreach ($lines as $line) {
            if (! $is_in_item) {
                // 今アイテムモードではない場合
                if (str_contains($line, '<Item>')) {
                    // <Item> -> アイテムモード有効
                    $is_in_item = true;
                    $current_warnings = [];
                    $current_city = [];
                    continue;
                }
            } else {
                // 今アイテムモードの場合
                if (str_contains($line, '<Kind>')) {
                    // <Kind> をみつけた
                    $item_mode = 'KIND';
                    $current_warning = [];
                    continue;

                } else if (str_contains($line, '<Area>')) {
                    // <Area> をみつけた
                    $item_mode = 'AREA';
                    continue;

                } else if (str_contains($line, '</Item>')) {
                    // </Item> -> アイテムモード解除
                    $is_in_item = false;

                    $items[] = [
                        'city_name' => $current_city['name'],
                        'warnings' => $current_warnings,
                    ];
                    continue;

                } else if (str_contains($line, '</Kind>')) {
                    // </Item> -> 種別モード解除なので、種別データを種別の配列に入れる。
                    $current_warnings[] = $current_warning;
                    continue;

                } else if (preg_match('/<Name>([\S\s]+?)<\/Name>/', $line, $matches)) {
                    $name = $matches[1];
                    if ($item_mode == 'KIND') {
                        $current_warning['name'] = $name;
                    } else if ($item_mode == 'AREA') {
                        $current_city['name'] = $name;
                    }
                }
            }
        }

        $a = [
            [
                "city_name" => "みらい市",
                "warnings" => [
                    [
                        "name" => "わんこ警報"
                    ],
                    [
                        "name" => "にゃんこ警報"
                    ]
                ]
            ],
            [
                "city_name" => "かこ市",
                "warnings" => [
                    [
                        "name" => "かえる警報"
                    ]
                ]
            ]
        ];

        $this->assertSame($a, $items);
    }

    // じぶんでやってみよう： レポートデータの作成。完成レポートを $r にいれる。
    // getOutput と同じデータになるように。
    public function test_340_format_xml(): void
    {
        // 元データを取得する
        $xml_raw = $this->getInput();
        $r = [];

        // QUIZ
		$a = null;
        // /QUIZ

        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }
}
