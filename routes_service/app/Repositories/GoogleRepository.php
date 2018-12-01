<?php

namespace App\Repositories;

use Markenwerk\CommonException;

class GoogleRepository {

    public static function converteEndereco($endereco)
    {

        try{
            // Perform lookup
            $addressLookup = new \Markenwerk\GoogleGeocode\Lookup\AddressLookup();

            // Optional adding an API key
            $addressLookup->setApiKey(env('API_GOOGLE_MAPS'));

            // Submit lookup
            $addressLookup->lookup($endereco);

            // Retrieving the lookup as an array of Markenwerk\GoogleGeocode\Result\GeoLookupResult instances
            $lookupResults = $addressLookup->getResults();

            // Get the number of lookup results
            $lookupResultCount = $addressLookup->getResultCount();

            // Retrieving the first lookup result as Markenwerk\GoogleGeocode\Result\GeoLookupResult instance
            $firstResult = $addressLookup->getFirstResult();

            return $lookupResults;
            
        } catch (CommonException\NetworkException\CurlException $exception) {
            return $exception;
        } catch (CommonException\ApiException\InvalidResponseException $exception) {
            return $exception;
            
        } catch (CommonException\ApiException\RequestQuotaException $exception) {
            return $exception;
            // Google Geocode API requests over the allowed limit
        } catch (CommonException\ApiException\NoResultException $exception) {
            return $exception;
            // Google Geocode API request had no result
        }

    }
    
}