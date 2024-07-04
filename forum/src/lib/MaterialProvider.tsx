"use client"

import { ThemeProvider, createTheme } from '@mui/material';

const theme = createTheme();

// Provider
function MaterialProvider({ children }: React.PropsWithChildren<{}>) {

  return <ThemeProvider theme={theme}>{children}</ThemeProvider>;
}

export default MaterialProvider;