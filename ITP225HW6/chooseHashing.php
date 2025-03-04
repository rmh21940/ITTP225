<?php
/**
 * chooseHashing.php
 *
 * A simple interactive PHP CLI script that allows the user to choose from multiple
 * hashing algorithms, prompts for a phrase, and then displays the hashed value.
 *
 * Updates:
 * - Converts the user's algorithm choice to lowercase, so case does not matter.
 * - Trims whitespace from the beginning and end of the entered phrase.
 *
 * Usage:
 *   1. From a terminal or command prompt, navigate to the directory containing this file.
 *   2. Run the script using: php -f chooseHashing.php
 *   3. Follow the prompts to select a hashing algorithm (in any case) and enter your phrase.
 *
 * Hashing Algorithms Included:
 *   - MD5
 *   - SHA1
 *   - SHA256
 *   - SHA384
 *   - SHA512
 *   - RIPEMD160
 *
 * Example Run:
 *   > php -f chooseHashing.php
 *   choose between md5, sha1, sha256, sha384, sha512, ripemd160 to hash your phrase? Md5
 *   Enter your sentence?   hello ITP 225 Students!  
 *   Your hashed value is: 6f4b5d57...
 *
 * Author: Your Name
 * Date: Current Date
 */

// Ensure the script is run from the command line
if (php_sapi_name() !== 'cli') {
    die("This script must be run from the command line.\n");
}

// List of supported algorithms
$availableAlgos = [
    'md5',
    'sha1',
    'sha256',
    'sha384',
    'sha512',
    'ripemd160'
];

// Prompt user to choose an algorithm
echo "choose between md5, sha1, sha256, sha384, sha512, ripemd160 to hash your phrase? ";
$algoInput = trim(fgets(STDIN));

// Convert the algorithm choice to lowercase for case-insensitivity
$algo = strtolower($algoInput);

// Validate the chosen algorithm
if (!in_array($algo, $availableAlgos)) {
    echo "Invalid choice. Please choose from: " . implode(", ", $availableAlgos) . ".\n";
    exit(1);
}

// Prompt user to enter a sentence
echo "Enter your sentence? ";
$sentence = trim(fgets(STDIN));  // Trims whitespace from both ends of the phrase

// Compute the hash using the selected algorithm
$hashedValue = hash($algo, $sentence);

// Output the hashed value
echo "Your hashed value is: " . $hashedValue . "\n";
?>
