<?php

namespace App\Traits;

use App\Observers\SampleObserver;

/**
 * サンプルテーブルモデルのObserver登録用トレイト
 *
 */
trait SampleObservable
{
  public static function bootSampleObservable()
  {
    self::observe(SampleObserver::class);
  }
}
