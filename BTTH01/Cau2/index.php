<?php
// Hàm đọc câu hỏi từ file TXT
function loadQuestionsFromTxt($filename) {
    $questions = [];
    $content = file_get_contents($filename);
    $parts = explode("\n\n", trim($content));

    foreach ($parts as $part) {
        $lines = explode("\n", $part);
        $questionText = $lines[0];
        $options = array_slice($lines, 1, -1); 
        $answerLine = end($lines);

        preg_match('/Đáp án: ([A-D])/', $answerLine, $matches);
        $answer = $matches[1] ?? null;

        $questions[] = [
            'question' => $questionText,
            'options' => $options,
            'answer' => $answer
        ];
    }
    return $questions;
}

$questions = loadQuestionsFromTxt('question.txt');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra trắc nghiệm</title>
</head>
<body>
    <h1>Bài kiểm tra trắc nghiệm</h1>
    <form action="result.php" method="POST">
        <?php foreach ($questions as $index => $q): ?>
            <div>
                <p><strong><?php echo htmlspecialchars($q['question']); ?></strong></p>
                <?php foreach ($q['options'] as $optIndex => $option): ?>
                    <label>
                        <input type="radio" name="question_<?php echo $index; ?>" value="<?php echo chr(65 + $optIndex); ?>" required>
                        <?php echo htmlspecialchars($option); ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
            <hr>
        <?php endforeach; ?>
        <button type="submit">Nộp bài</button>
    </form>
</body>
</html>
