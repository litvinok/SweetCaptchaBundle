<?php

namespace SweetCaptcha\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SweetCaptchaExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
	{
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $sweetCaptchaDefinition = $container->getDefinition('sweet_captcha.service');
        $sweetCaptchaDefinition->replaceArgument(0, $config['id']);
        $sweetCaptchaDefinition->replaceArgument(1, $config['key']);
        $sweetCaptchaDefinition->replaceArgument(2, $config['secret']);
	}
}
