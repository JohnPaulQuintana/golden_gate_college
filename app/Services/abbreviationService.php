<?php

namespace App\Services;

class AbbreviationService
{
    /**
     * Generate initials from a name.
     *
     * @param string $name
     * @return string
     */
    public function generateAbbreviation($name)
    {
        // Words to ignore
        $ignoreWords = ['of', 'in', 'and', 'the'];

        // Remove any text in parentheses and the parentheses themselves
        $name = preg_replace('/\s*\(.*?\)\s*/', ' ', $name);

        // Split the name into words
        $words = explode(' ', $name);
        $abbreviation = '';

        foreach ($words as $word) {
            // Ignore specified words and empty entries
            if (!in_array(strtolower($word), $ignoreWords) && !empty(trim($word))) {
                // Get the first letter of each relevant word
                $abbreviation .= strtoupper($word[0]);
            }
        }

        return $abbreviation;
    }

    

}
