<?php

namespace App\ValueObjects;

/**
 * PhoneNumber Value Object
 * @package App\ValueObjects
 */
class PhoneNumber
{
    private string $formattedPhoneNumber;

    /**
     * @param  string  $input
     */
    public function __construct(mixed $input)
    {
        $parsedInput = $this->parseInput($input);

        $this->formatPhoneNumber(
            $parsedInput[0],    // Country code
            $parsedInput[1],       // Area code
            $parsedInput[2]          // Phone number
        );
    }

    /**
     * @param  string  $input
     * @return array
     */
    private function parseInput(string $input): array
    {
        // Replace input to only number
        $sanitizedInput = preg_replace('/^\+|[^0-9]/', '', $input);

        // Replace "00" to ""
        $sanitizedInput = preg_replace('/^00/', '', $sanitizedInput);

        // Replace "06" to "36"
        $sanitizedInput = preg_replace('/^06|^36/', '', $sanitizedInput);

        // Country code: "36"
        $countryCode = '36';

        // Set area code and phone number
        if ((substr($sanitizedInput, 0, 1) === '1')) {
            $areaCode    = substr($sanitizedInput, 0, 1);
            $phoneNumber = substr($sanitizedInput, 1);
        } else {
            $areaCode    = substr($sanitizedInput, 0, 2);
            $phoneNumber = substr($sanitizedInput, 2);
        }

        return [$countryCode, $areaCode, $phoneNumber];
    }
    /**
     * @param  string  $countryCode
     * @param  string  $areaCode
     * @param  string  $number
     * @return void
     */
    private function formatPhoneNumber(string $countryCode, string $areaCode, string $number): void
    {
        $number                     = $this->tagPhoneNumber($number);
        $this->formattedPhoneNumber = "+{$countryCode} ({$areaCode}) {$number}";
    }
    /**
     * @param  string  $number
     * @return string
     */
    private function tagPhoneNumber(string $number): string
    {
        return preg_replace('/(.{3})(.*)/', '$1 $2', $number);
    }
    /**
     * @return string
     */
    public function getFormattedPhoneNumber(): string
    {
        return $this->formattedPhoneNumber;
    }
    /**
     * @param  string  $input
     * @return string
     */
    public static function getFromString(string $input): string
    {
        $phoneNumber = new self($input);

        return $phoneNumber->getFormattedPhoneNumber();
    }
}
