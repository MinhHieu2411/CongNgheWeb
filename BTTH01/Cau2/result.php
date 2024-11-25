<?php
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

$questions = loadQuestionsFromTxt('questions.txt');
$score = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($questions as $index => $q) {
        $userAnswer = $_POST["question_$index"] ?? null;
        if ($userAnswer === $q['answer']) {
            $score++;
        }
    }
    $totalQuestions = count($questions);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả trắc nghiệm</title>
</head>
<body>
    <h1>Kết quả của bạn</h1>
    <p>Bạn trả lời đúng <strong><?php echo $score; ?></strong> trên <strong><?php echo $totalQuestions; ?></strong> câu hỏi.</p>
    <a href="index.php">Làm lại bài kiểm tra</a>
</body>
</html>
