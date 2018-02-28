<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UsernameValid implements Rule {

    private $badwords = ['cat', 'dog', 'horse'];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        ;
    }

    /**
     * splits a string into words, assumes no spaces
     * returns lower case array of words, separated by upper -> lower case switch
     * but not lower -> upper
     * @param string $input
     * @return array
     */
    protected function getWords(string $input): array {

        $lastCase = null;
        $result = [];
        $currentString = '';
        for ($x = 0; $x < strlen($input); $x++) {
            $isUpperCase = ctype_upper($input[$x]);
            // If thisi s the first iteration
            if (is_null($lastCase)) {
                $currentString .= strtolower($input[$x]);
            } else {
                // If we have gone to upper then new word
                if ($isUpperCase) {
                    $result[] = strToLower($currentString);
                    $currentString =  strToLower($input[$x]);
                } else {
                    $currentString .= strToLower($input[$x]);
                }
            }
            // Retain the currentCase. More readable than putting in the if statement above
            // but uses a couple of processor cycles more. Sorry.
            $lastCase = ($isUpperCase) ? 'upper' : 'lower';
        }
        // Add the last word to the array
        if (!empty($currentString))
        {
            $result[] = $currentString;
        }
        return $result;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        // By default, a blank username passes this specific test
        $passes = true;
        $words = $this->getWords($value);
        // If any of our badwords exists here, then report a fail
        foreach ($this->badwords as $badword) {
            if (in_array($badword, $words)) {
                $passes = false;
                // no point carrying on.
                break;
            }
        }

        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Your :attribute contains invalid words, please do not include ' . implode(', ', $this->badwords);
    }

}
