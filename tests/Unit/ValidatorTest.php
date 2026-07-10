<?php

use Core\Validator;

it('validates a string', function () {

    expect(Validator::valid('foobar'))->toBeTrue();
    expect(Validator::valid(false))->toBeFalse();
    expect(Validator::valid(''))->toBeFalse();

});

it('validates a string with minimum length', function () {

    expect(Validator::valid('foobar', 20))->toBeFalse();
 
});

it('validates an email', function () {

    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foobar@example.com'))->toBeTrue();
 
});

 