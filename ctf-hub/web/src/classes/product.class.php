<?php

class Products
{
    public static $available_products = [];

    /** 
     * Get available products.
     * 
     * This get_available function is used to get cart items.
     * 
     * @param string $product_name product name.
     * 
     * @return string If the command is executed.
     * */
    public static function get_available($product_name)
    {
        // TODO: Use regex to filter the input ,it provide more controls over the input data.
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
            'env',
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
                return "Command contains forbidden character: $char";
            } else {
                $command = "cat " . $products_root_location . $product_name . '.json';
                $result = shell_exec($command);
                return $result;
            }
        }
    }
}
