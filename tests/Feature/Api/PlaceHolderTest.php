<?php

it('gets a list of to do tasks', function () {
   $response = fixture('placeholder');

   Http::fake([
       'https://placeholders.com/*' => Http::response(
           body: $response,
       ),
   ]);

   $response = Http::get('https://placeholders.com/get-todos', [
       'test' => 'added',
   ]);

   expect($response->json())->toBeArray();
   expect($response->json())->not()->toBeNull();

   $collect = new \Illuminate\Support\Collection($response->json('mainKey'));

   $collect->each(function ($todo) {
       expect(key_exists('userId', $todo))->toBeTrue();
   });
});
