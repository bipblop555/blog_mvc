<?php 

namespace App\Traits;

trait FileParser
{
    public function getNamespacesFromComposerJson(string $file)
    {
        if (!file_exists($file))
        {
            throw new \InvalidArgumentException('Fichier non trouvé');
        }
        $json = json_encode(file_get_contents($file), true);
        return $json['autoload']['psr-4'];
    }
}