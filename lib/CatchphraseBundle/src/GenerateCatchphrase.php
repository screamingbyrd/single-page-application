<?php


namespace Art\CatchphraseBundle;


class GenerateCatchphrase
{
    private $numberOfWord;

    public function __construct($numberOfWord = 1)
    {
        $this->numberOfWord = $numberOfWord;
    }

    /**
     * Returns random catchphrase.
     *
     * @return string
     */
    public function getCatchphrase(): string
    {
        $len = 10;
        $catchphrase = '';
        for ($i = 0; $i <= $this->numberOfWord; $i++) {
            $word = array_merge(range('a', 'z'), range('A', 'Z'));
            shuffle($word);

            $catchphrase.= substr(implode($word), 0, $len) . ' ';
        }

        return $catchphrase . ' !';
    }

}