<?php


namespace Art\CatchphraseBundle;


use Art\CatchphraseBundle\DependencyInjection\ArtCatchphraseExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ArtCatchphraseBundle extends Bundle
{
    /**
     * Overridden to allow for the custom extension alias.
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new ArtCatchphraseExtension();
        }
        return $this->extension;
    }
}