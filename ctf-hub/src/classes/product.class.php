<?php

class Products
{
    public static function get_available($product_name)
    {
        $products_root_location = "products/";
        $dangerous_chars =  [
            ';',
            '&',
            '`',
            '>',
            '<',
            '$',
            '(',
            ')',
            '{',
            '}',
            '[',
            ']',
            '*',
            '?',
            '~',
            '#',
            '!',
            'cd',
            'nc',
            'rm',
            'bash',
            'sh',
            'zsh',
            'nc',
            'netcat',
            'ncat',
            'bash',
            'sh',
            'zsh',
            'python',
            'python3',
            'perl',
            'php',
            'ruby',
            'node',
            'lua',
            'curl',
            'wget',
            'telnet',
            'socat',
            'eval',
            'exec',
            'system',
            'passthru',
            'subprocess',
            '/dev/tcp/',
            '/dev/udp/',
            '2>&1',
            '>&',
            '|',
            ';',
            '&',
            'base64',
            'gzip',
            'gunzip',
            'xterm'
        ];

        foreach ($dangerous_chars as $char) {
            if (str_contains($product_name, $char)) {
                return "⚠️ Command contains forbidden character: $char";
            } else {
                $command = "cat " . $products_root_location . $product_name . '.json';
                $result = shell_exec($command);
                return $result;
            }
        }
    }
}
