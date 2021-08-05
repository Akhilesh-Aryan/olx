<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductCard extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <div class="col-3 mb-2">
                        <div class="card">
                            <img src="" class="card-img-top" style="object-fit: cover; height:200px;" alt="">
                            <div class="card-body">
                                <h5 class="text-bolder">
                                    ₹ : 500/-
                                </h5>
                                <h6 class="small text-capatalized font-bolder text-truncate">Title/h6>
                                <a href="" class="nav-link stretched-link"></a>
                            </div>
                        </div>
                    </div>
            </div>
        blade;
    }
}
