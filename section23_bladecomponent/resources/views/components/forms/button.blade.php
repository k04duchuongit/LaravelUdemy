<button {{ $attributes }}>Test button</button>


<button {{ $attributes->merge(['class'=>'btn', 'style' => 'padding: 10px']) }}>Test button</button>
