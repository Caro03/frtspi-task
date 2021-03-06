const defaultTheme = require("tailwindcss/defaultTheme");

const colorShade = require("./tailoff/tailwind/color-shades");
// const underlineAnimation = require("./tailoff/tailwind/underline-animation");
const aspectRatio = require("tailwindcss-aspect-ratio");

const siteColors = {
  primary: {
    default: "#104378",
    contrast: "#ffffff",
    hover: "#B81817",
    hoverContrast: "#ffffff",
  },
  secondary: {
    default: "#B81817",
    contrast: "#ffffff",
    hover: "#991211",
    hoverContrast: "#ffffff",
  },
};

module.exports = {
  target: "ie11",
  theme: {
    borderWidth: {
      default: "1px",
      0: "0",
      1: "1px",
      2: "2px",
      3: "3px",
    },
    container: {
      center: true,
      padding: defaultTheme.spacing["4"],
    },
    fontFamily: {
      accent: ["'Playfair Display', serif"],
      base: ["'Roboto Condensed', sans-serif"],
    },
    screens: {
      xs: "480px",
      sm: "660px",
      md: "820px",
      lg: "980px",
      xl: "1200px",
    },
    colors: {
      ...defaultTheme.colors,
      ...siteColors,
      black: "#333333",
      light: "#F0EBEA",
      colorfull: "#b81817",
      gray: {
        ...defaultTheme.colors.gray,
        100: "#f5f5f5",
      },
    },
    aspectRatio: {
      none: 0,
      square: [1, 1],
      "16/9": [16, 9],
      "4/3": [4, 3],
      "21/9": [21, 9],
    },
    extend: {
      maxWidth: {
        flyout: "280px",
        modal: "50vw",
        logo: "150px",
      },
      zIndex: {
        99: "99",
        100: "100",
      },
      boxShadow: {
        card: "0 0 30px 0 rgba(0,0,0,0.15)",
        focus: "0 0 0 3px rgba(238,71,55,0.5)",
      },
      inset: {
        "1/2": "50%",
      },
    },
  },
  variants: {
    textDecoration: ({ after }) => after(['group-hover']),
  },
  plugins: [
    colorShade(siteColors),
    // underlineAnimation,
    aspectRatio,
  ],
};
