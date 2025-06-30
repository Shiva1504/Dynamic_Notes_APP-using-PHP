<?php

use Core\Validator;

it("validate a string", function () {
    expect(Validator::string('test'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('Validate     a string with a minimum length', function () {
    expect(Validator::string('test', 3))->toBeTrue();
    expect(Validator::string('te', 3))->toBeFalse();
    expect(Validator::string('test', 5))->toBeFalse();
});

it('Validate a email', function () {
    expect(Validator::email('test@example.com'))->toBeTrue();
    expect(Validator::email('test@example'))->toBeFalse();
    expect(Validator::email('test@.com'))->toBeFalse();
    expect(Validator::email('test'))->toBeFalse();
});

it('Validate a number greater than a minimum value', function () {
    expect(Validator::GreaterThan(5, 3))->toBeTrue();
    expect(Validator::GreaterThan(3, 5))->toBeFalse();
    expect(Validator::GreaterThan(5, 5))->toBeFalse();
})->only();
