<?php

test('cv page can be accesses', function () {
    $response = $this->get(route('cv.index'));

    $response->assertStatus(200);
    $response->assertSee('Work Experience');
    $response->assertSee('Education');
    $response->assertSee('Skills');
    $response->assertSee('Languages');
});
