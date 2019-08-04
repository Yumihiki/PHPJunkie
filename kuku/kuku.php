<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="kuku.css">
  <title>九九</title>
</head>
<body>
<table>
  <tr>
    <?php 
    // 一番上の行
    for ($i = 0; $i <= 9; ++$i) {
        echo ($i === 0) ? '<th></th>' : "<th>$i</th>";
    }
    ?>
  </tr>
  <?php 
    for ($j = 1; $j <= 9; ++$j) {
        echo '<tr>';
        for ($i = 1; $i <= 9; ++$i) {
            $ji = $j * $i;

            // 一番左の列
            echo ($i === 1) ? "<th class='mostLeft'>$ji</th>" : '';

            // 縦かける横の実行結果
            $className = ($ji % 2 === 0) ? 'even' : 'odd';
            $td = "<td class='$className'>$ji</td>";
            echo $td;
          }
        echo '</tr>';
    }
  ?>
</table>
</body>
</html>