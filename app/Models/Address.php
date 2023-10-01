<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property string|null $salutation
 * @property string|null $company
 * @property string|null $vat_id
 * @property string|null $title
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $patronymic
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $address3
 * @property string|null $postal
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $language
 * @property int|null $language_id
 * @property string|null $telephone
 * @property string|null $telefax
 * @property string|null $email
 * @property string|null $website
 * @property string|null $inn
 * @property string|null $ogrn
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $birthday
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereOgrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTelefax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereVatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereWebsite($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;
}
