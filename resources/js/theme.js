import { ref } from 'vue';

// Startwert kommt vom Inline-Script in welcome.blade.php (verhindert Flackern).
const isDark = ref(document.documentElement.classList.contains('dark'));

function applyTheme(dark) {
  document.documentElement.classList.toggle('dark', dark);
  localStorage.setItem('theme', dark ? 'dark' : 'light');
  isDark.value = dark;
}

function toggleTheme() {
  applyTheme(!isDark.value);
}

export function useTheme() {
  return { isDark, toggleTheme };
}
