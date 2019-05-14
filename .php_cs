<?php
$header = <<<EOF
This file is part of the PMG Api Library project.
@copyright Pathfinder Media Group. All rights reserved

Please see the license attached to this project.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests');
return PhpCsFixer\Config::create()
    ->setRules([
        'header_comment' => [
                    'header' => $header
                ],
       'psr0' => false,
       '@PSR2' => true,
       'blank_line_after_namespace' => true,
       'blank_line_before_return' => true,
       'braces' => true,
       'binary_operator_spaces' => [
           'align_double_arrow' => true,
           'align_equals' => true
       ],
       'class_definition' => true,
       'class_attributes_separation' => true,
       'elseif' => true,
       'function_declaration' => true,
       'indentation_type' => true,
       'line_ending' => true,
       'lowercase_constants' => true,
       'lowercase_keywords' => true,
       'method_argument_space' => [
           'ensure_fully_multiline' => true, ],
       'no_break_comment' => true,
       'no_closing_tag' => true,
       'no_spaces_after_function_name' => true,
       'no_spaces_inside_parenthesis' => true,
       'no_trailing_whitespace' => true,
       'no_trailing_whitespace_in_comment' => true,
       'single_blank_line_at_eof' => true,
       'no_unused_imports' => true,
       'ordered_imports' => true,
       'single_class_element_per_statement' => [
           'elements' => ['property'],
       ],
       'single_import_per_statement' => true,
       'single_line_after_imports' => true,
       'switch_case_semicolon_to_colon' => true,
       'switch_case_space' => true,
       'visibility_required' => true,
       'encoding' => true,
       'full_opening_tag' => true,
       'array_syntax' => [
           'syntax' => 'short'
       ],
       'yoda_style' => [
           'equal' => true,
           'identical' => true,
           'less_and_greater' => true,
       ]
       ]
    )
    ->setFinder($finder);