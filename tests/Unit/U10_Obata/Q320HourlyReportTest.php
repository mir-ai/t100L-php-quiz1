<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q320HourlyReportTest extends TestCase
{
    //
    public function test_320_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // クイズ： getInput() のデータから、 getReportTable() の配列を作成して下さい。
    // これが入力データの配列
    private function getInput(): array
    {
        return [
            [
                'time' =>  '06:20',
                'action' => 'KISYO',
            ],
            [
                'time' => '08:15',
                'action' => 'SYOKUJI',
            ],
            [
                'time' => '12:01',
                'action' => 'SYOKUJI',
            ],
            [
                'time' => '18:03',
                'action' => 'SYOKUJI',
            ],
            [
                'time' => '21:36',
                'action' => 'SLEEP',
            ],
            [
                'time' => '23:00',
            ],
            [
                'action' => '#$%^&&*GOMI_DATA',
            ],
            [
                'time' => '25:00',
            ],
        ];
    }

    // これが出力データの配列
    private function getOutput(): array
    {
        return [
            ['時間','起床','食事','就寝'],
            [' 0時',   0,    0,    0],
            [' 1時',   0,    0,    0],
            [' 2時',   0,    0,    0],
            [' 3時',   0,    0,    0],
            [' 4時',   0,    0,    0],
            [' 5時',   0,    0,    0],
            [' 6時',   1,    0,    0],
            [' 7時',   0,    0,    0],
            [' 8時',   0,    1,    0],
            [' 9時',   0,    0,    0],
            ['10時',   0,    0,    0],
            ['11時',   0,    0,    0],
            ['12時',   0,    1,    0],
            ['13時',   0,    0,    0],
            ['14時',   0,    0,    0],
            ['15時',   0,    0,    0],
            ['16時',   0,    0,    0],
            ['17時',   0,    0,    0],
            ['18時',   0,    1,    0],
            ['19時',   0,    0,    0],
            ['20時',   0,    0,    0],
            ['21時',   0,    0,    1],
            ['22時',   0,    0,    0],
            ['23時',   0,    0,    0],
        ];
    }

    // 要素分解1: 不正なデータを弾く
    public function test_320_020_skip_invalid_data(): void
    {
        $log_items = [
            [
                'time' => '21:36',
                'action' => 'SLEEP',
            ],
            [
                'time' => '23:00',
            ],
            [
                'action' => '#$%^&&*GOMI_DATA',
            ],
            [
                'time' => '25:00',
            ],
        ];

        $valid_items = [];
        foreach ($log_items as $log_item) {
            $time = $log_item['time'] ?? '';
            $action = $log_item['action'] ?? '';

            if (! $time) {
                continue;
            }

            if (! $action) {
                continue;
            }

            if (! in_array($action, ['KISYO', 'SYOKUJI', 'SLEEP'])) {
                continue;
            }

            [$_hour, $minute] = sscanf($time, "%02d:%02d");

            if ($_hour < 0) {
                continue;
            }

            if ($_hour > 23) {
                continue;
            }

            // 有効なデータのみ残った
            $valid_items[] = $log_item;
        }

        $a = [
            [
                'time' => '21:36',
                'action' => 'SLEEP',
            ],
        ];

        $this->assertSame($a, $valid_items);
    }

    // 要素分解2: 下書きデータにデータを足していく
    public function test_320_030_fill_data(): void
    {
        // 下書きデータは、時間(int)をキーとし、それぞれの時間に連想配列(action => 件数)を持った配列とする。
        $draft_reports = [];

        // ログデータ
        $log_items = [
            ['hour' => 6, 'action' => 'KISYO'],
            ['hour' => 9, 'action' => 'SYOKUJI'],
            ['hour' => 9, 'action' => 'SYOKUJI'],
            ['hour' => 9, 'action' => 'SYOKUJI'],
            ['hour' => 21, 'action' => 'SLEEP'],
        ];

        foreach ($log_items as $log_item) {
            $hour = $log_item['hour'] ?? '';
            $action = $log_item['action'] ?? '';

            // 元の値を取る。値がなければ 0 をいれる。
            $v = $draft_reports[$hour][$action] ?? 0;

            // もとに値に1足して書き戻す。
            $draft_reports[$hour][$action] = $v + 1;
        }

        $a = [
             6 => ['KISYO' => 1],
             9 => ['SYOKUJI' => 3],
            21 => ['SLEEP' => 1],
        ];

        $this->assertSame($a, $draft_reports);
    }

    // 要素分解3: 下書きデータからレポートデータを作る
    public function test_320_040_fill_data(): void
    {
        $draft_reports = [
             6 => ['KISYO' => 1],
             9 => ['SYOKUJI' => 3],
            21 => ['SLEEP' => 1],
        ];

        $final_reports = [];
        $final_reports[] = ['時間','起床','食事','就寝'];
        for ($hour = 0; $hour < 24; $hour++) {
            $final_reports[] = [
                sprintf("%2d時", $hour),
                $draft_reports[$hour]['KISYO'] ?? 0,
                $draft_reports[$hour]['SYOKUJI'] ?? 0,
                $draft_reports[$hour]['SLEEP'] ?? 0,
            ];
        }

        $a = [
            ["時間","起床","食事","就寝"],
            [" 0時",0,0,0],
            [" 1時",0,0,0],
            [" 2時",0,0,0],
            [" 3時",0,0,0],
            [" 4時",0,0,0],
            [" 5時",0,0,0],
            [" 6時",1,0,0],
            [" 7時",0,0,0],
            [" 8時",0,0,0],
            [" 9時",0,3,0],
            ["10時",0,0,0],
            ["11時",0,0,0],
            ["12時",0,0,0],
            ["13時",0,0,0],
            ["14時",0,0,0],
            ["15時",0,0,0],
            ["16時",0,0,0],
            ["17時",0,0,0],
            ["18時",0,0,0],
            ["19時",0,0,0],
            ["20時",0,0,0],
            ["21時",0,0,1],
            ["22時",0,0,0],
            ["23時",0,0,0]
        ];

        $this->assertSame($a, $final_reports);
    }

    // じぶんでやってみよう： レポートデータの作成。完成レポートを $r にいれる。
    // getOutput と同じデータになるように。
    public function test_320_make_report(): void
    {
        // 元データを取得する
        $action_logs = $this->getInput();
        $r = [];

        // QUIZ
		$a = null;
        // /QUIZ

        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }
}
