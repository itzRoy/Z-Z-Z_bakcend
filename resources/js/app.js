import React from 'react'
import { render } from 'react-dom'
import { createInertiaApp } from '@inertiajs/inertia-react'

createInertiaApp({
  resolve: name => require(`/home/roy/Desktop/git/own/e-commerce/backend/resources/Pages${name}`),
  setup({ el, App, props }) {
    render(<App {...props} />, el)
  },
})