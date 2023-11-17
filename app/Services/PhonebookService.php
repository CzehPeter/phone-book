<?php

namespace App\Services;

use App\Http\Requests\PhonebookRequest;
use App\Models\Phonebook;

class PhonebookService
{
    protected $phonebook = Phonebook::class;

    public function __construct()
    {
        $this->phonebook = new Phonebook();
    }

    /**
     * @param  string  $search
     * @param  string  $orderBy
     * @param  string  $orderDirection
     * @param  int     $page
     * @param  int     $perPage
     * @param  bool    $returnArray
     * @return mixed
     */
    public function getPhonebook(
        string $search = '',
        string $orderBy = 'phonebook.name',
        string $orderDirection = 'asc',
        int    $page = 1,
        int    $perPage = 20,
        bool   $arrayReturn = true
    ): mixed
    {
        $query = $this->phonebook->with('numbers', 'emails')
                    ->where(
                        'phonebook.name',
                        'LIKE',
                        '%' . $search . '%'
                    )
                    ->orderBy(
                        ( 'phonebook.name' ),
                        ( $orderDirection === 'asc' ? $orderDirection : 'desc' )
                    )
                    ->paginate(
                        $perPage,
                        ['*'],
                        'page',
                        $page
                    )->getCollection();

        return $arrayReturn ?
            $query->toArray() :
            $query;
    }

    public function create(PhonebookRequest $data)
    {
        /** Creat Phonebook */
        $phonebook = $this->phonebook->create($data);
        /** Creat Phonebook Number */
        $phonebook->phonebookNumbers()->create($data->phone_number);
        /** Creat Phonebook Email */
        if ($phonebook && !empty($data->email)) {
            $phonebook->phonebookEmails()->create($data->email);
        }

        return $phonebook;
    }
}
