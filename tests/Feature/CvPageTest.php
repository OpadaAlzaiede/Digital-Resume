<?php

test('cv page can be accessed', function () {
    $response = $this->get(route('cv.index'));

    $response->assertStatus(200);
    $response->assertSee('Work Experience');
    $response->assertSee('Education');
    $response->assertSee('Skills');
    $response->assertSee('Languages');
});

test('cv can be downloaded as pdf', function () {
    $response = $this->get(route('cv.download'));

    $response->assertStatus(200);
    $response->assertHeader('Content-Type', 'application/pdf');
    $response->assertHeader('Content-Disposition', 'attachment; filename=John_Doe_CV.pdf');
});
