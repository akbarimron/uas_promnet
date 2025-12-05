<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    /**
     * Get galleries from JSON file
     */
    public function getGalleries()
    {
        try {
            // Baca file JSON dari storage
            $jsonPath = storage_path('app/json/galleries.json');
            
            if (File::exists($jsonPath)) {
                $json = File::get($jsonPath);
                $galleries = json_decode($json, true);
                
                // Filter hanya yang active dan urutkan
                $galleries = array_filter($galleries, function($item) {
                    return $item['active'] === true;
                });
                
                usort($galleries, function($a, $b) {
                    return $a['order'] - $b['order'];
                });
                
                return array_values($galleries);
            }
            
            return [];
        } catch (\Exception $e) {
            \Log::error('Error reading galleries JSON: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Show gallery page
     */
    public function gallery()
    {
        $galleries = $this->getGalleries();
        return view('page.gallery', ['galleries' => $galleries]);
    }



    
     public function getStores()
    {
        try {
            // Baca file JSON dari storage
            $jsonPath = storage_path('app/json/stores.json');
            
            if (File::exists($jsonPath)) {
                $json = File::get($jsonPath);
                $stores = json_decode($json, true);
                
                // Filter hanya yang active dan urutkan
                $stores = array_filter($stores, function($item) {
                    return $item['active'] === true;
                });
                
                usort($stores, function($a, $b) {
                    return $a['order'] - $b['order'];
                });
                
                return array_values($stores);
            }
            
            return [];
        } catch (\Exception $e) {
            \Log::error('Error reading stores JSON: ' . $e->getMessage());
            return [];
        }
    }



    /**
     * Show store page
     */
    public function store()
    {
        $stores = $this->getStores();
        return view('page.store', ['stores' => $stores]);
    }


    public function getFAQ()
    {
        try {
            // Baca file JSON dari storage
            $jsonPath = storage_path('app/json/faqs.json');
            
            if (File::exists($jsonPath)) {
                $json = File::get($jsonPath);
                $faqs = json_decode($json, true);
                
                // Filter hanya yang active dan urutkan
                $faqs = array_filter($faqs, function($item) {
                    return $item['active'] === true;
                });
                
                usort($faqs, function($a, $b) {
                    return $a['order'] - $b['order'];
                });
                
                return array_values($faqs);
            }
            
            return [];
        } catch (\Exception $e) {
            \Log::error('Error reading FAQ JSON: ' . $e->getMessage());
            return [];
        }
    }

    public function faq()
    {
        $faqs = $this->getFAQ();
        return view('page.faq', ['faqs' => $faqs]);
    }

    public function getGoals()
    {
        try {
            // Baca file JSON dari storage
            $jsonPath = storage_path('app/json/goals.json');
            
            if (File::exists($jsonPath)) {
                $json = File::get($jsonPath);
                $goals = json_decode($json, true);
                
                // Filter hanya yang active dan urutkan
                $goals = array_filter($goals, function($item) {
                    return $item['active'] === true;
                });
                
                usort($goals, function($a, $b) {
                    return $a['order'] - $b['order'];
                });
                
                return array_values($goals);
            }
            
            return [];
        } catch (\Exception $e) {
            \Log::error('Error reading goals JSON: ' . $e->getMessage());
            return [];
        }
    }
    public function goals()
    {
        $goals = $this->getGoals();
        return view('page.goals', ['goals' => $goals]);
    }
}

