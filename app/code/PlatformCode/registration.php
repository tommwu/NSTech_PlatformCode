<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'NSTech_PlatformCode',
    isset($file) ? dirname($file) : __DIR__
);
