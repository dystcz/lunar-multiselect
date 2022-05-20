import { Alpine } from "./alpine";
import select from "./select";

declare global {
  interface Window {
    Alpine: Alpine;
    Livewire: any;
  }
}

document.addEventListener("alpine:init", () => {
  window.Alpine.data("select", select);
});
