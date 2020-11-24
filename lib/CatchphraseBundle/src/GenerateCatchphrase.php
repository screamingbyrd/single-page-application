<?php


namespace Art\CatchphraseBundle;


class GenerateCatchphrase
{
    public function __construct()
    {
    }

    /**
     * Returns random catchphrase.
     *
     * @return string
     */
    public function getCatchphrase(): string
    {
        $len = 10;
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

}