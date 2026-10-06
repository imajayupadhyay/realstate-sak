<script setup>
// Label + input slot + validation error, used by EnquiryForm.
defineProps({
    label: { type: String, required: true },
    id: { type: String, required: true },
    error: { type: String, default: '' },
    required: { type: Boolean, default: false },
});
</script>

<template>
    <div>
        <label :for="id" class="block text-sm font-medium text-brand-navy">
            {{ label }}<span v-if="required" class="text-brand-orange"> *</span>
        </label>
        <div class="mt-2">
            <slot />
        </div>
        <p v-if="error" class="mt-1.5 text-xs text-red-600">{{ error }}</p>
    </div>
</template>
