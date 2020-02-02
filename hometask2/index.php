<?php

interface Input
{
    function show();

    function addStyles($arr);
}

class  InputEmail implements Input
{
    protected $_html = '<input type="email" />';

    function show()
    {
        return $this->_html;
    }

    function addStyles($arr)
    {
        $style = '';

        foreach ($arr as $key => $value) {
            $style .= $key . ':' . $value . '; ';
        }

        return $str = 'input[type="email"] {' . $style . '}';
    }

}

class  InputFile implements Input
{
    protected $_html = '<input type="file" />';

    function show()
    {
        return $this->_html;
    }

    function addStyles($arr)
    {
        $style = '';

        foreach ($arr as $key => $value) {
            $style .= $key . ':' . $value . '; ';
        }

        return $str = 'input[type="file"] {' . $style . '}';
    }


}

class InputText implements Input
{
    protected $_html = '<input type="text" />';

    function show()
    {
        return $this->_html;
    }

    function addStyles($arr)
    {
        $style = '';

        foreach ($arr as $key => $value) {
            $style .= $key . ':' . $value . '; ';
        }

        return $str = 'input[type="text"] {' . $style . '}';
    }
}

?>

<?php
$inputEmail = new InputEmail();
$inputFile = new InputFile();
$inputText = new InputText();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        <?php
        echo $inputEmail->addStyles(["border-radius" => "5px", "padding" => "10px", "color" => "green", "width" => "200px", "margin" => "10px"]);
        echo $inputFile->addStyles(["color" => "red"]);
        echo $inputText->addStyles(["border-radius" => "5px", "padding" => "10px", "color" => "green", "width" => "200px", "margin" => "10px"]);
        ?>

    </style>
</head>
<body>

<?php
echo $inputEmail->show().'<br>';
echo $inputFile->show().'<br>';
echo $inputText->show();
?>


</body>
</html>