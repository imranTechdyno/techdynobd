@php

$platformElement = element('platform.element');
@endphp

<!-- box slider our sister concern -->
<div class="sister">Our Sister Concern</div>
<section class="card_container">
    <div class="container">
        <div class="row">
            <div class="multiple-items">
                @forelse ($platformElement as $item)
                <div class="col-md-12">
                    <div class="card">
                        <h2>{{@$item->data->sub_title}}</h2>

                        <p>
                            {{@$item->data->short_description}}
                            <a href="">VIEW MORE..</a>
                        </p>
                    </div>
                </div>
                @empty
                    
                @endforelse
            </div>
        </div>
        <center>
            <button class="btn btn-primary sis">All Sister Concern</button>
        </center>
    </div>
</section>

<!-- box slider our sister concern end-->