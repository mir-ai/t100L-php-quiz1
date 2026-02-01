{{-- SampleV4Controller.php --}}

{{-- サンプルテーブル用の追加JS --}}
<script type="module">
  $(function() {
    // 削除ボタン押下時の確認ダイアログ
    $('#exec_destroy').click(function() {

      ret = confirm("サンプルテーブル「{{ $sample->ItemTitle ?? '' }}」を削除してよろしいですか？");
      if (ret == false) {
        return false;
      }
    });
  });
</script>
