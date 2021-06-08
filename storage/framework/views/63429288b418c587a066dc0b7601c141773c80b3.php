<div class="mt-6 flex items-center justify-between">
    <button <?php echo $attributes->merge([
        'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
        'type' => 'submit'
    ]); ?>>
        <?php echo trim($slot) ?: __('Submit'); ?>

    </button>
</div><?php /**PATH C:\srv\laravel\supermercado\vendor\protonemedia\laravel-form-components\src\Support/../../resources/views/tailwind/form-submit.blade.php ENDPATH**/ ?>