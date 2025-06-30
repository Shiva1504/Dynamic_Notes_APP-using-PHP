<?php

use Core\Container;

test('it can resolve something outside of container ', function () {

    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    $result = $container->resolve('foo');

    expect($result)->toEqual('bar');
});