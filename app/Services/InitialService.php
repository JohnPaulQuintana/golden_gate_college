<?php

namespace App\Services;

class InitialService
{
    /**
     * Generate initials from a name.
     *
     * @param string $name
     * @return string
     */
    public function getInitials($name)
    {
        $initials = collect(explode(' ', $name)) // Split the name by spaces
            ->map(function ($word) { // Get the first letter of each word
                return strtoupper(substr($word, 0, 1));
            })->implode(''); // Join the initials

        return $initials; // Output: JD
    }

    public function generateDepartmentCode($name)
    {
        // Split the name by spaces and collect the words
        $words = collect(explode(' ', $name));
        
        // Generate the department code by taking the first letter of each word
        // or, for some cases, take the first few letters of key words.
        $code = $words->map(function ($word) {
            // Return the first 3 letters of each word, capitalized
            return strtoupper(substr($word, 0, 3));
        })->implode(''); // Join them together
        
        // Limit the department code to a maximum of 6 characters
        return substr($code, 0, 6); 
    }

}
