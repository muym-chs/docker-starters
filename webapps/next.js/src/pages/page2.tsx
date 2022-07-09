import {Box, Button, Container, Typography} from '@mui/material';
import type {NextPage} from 'next';
import Head from 'next/head';

import MyButton from '@/components/MyButton/MyButton';
import ImageContainer from '@/containers/ImageContainer';
import Title from '@/stories/Title/Title';

import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import useScrollTrigger from '@mui/material/useScrollTrigger';
import BottomNavigation from '@mui/material/BottomNavigation';
import BottomNavigationAction from '@mui/material/BottomNavigationAction';
import RestoreIcon from '@mui/icons-material/Restore';
import FavoriteIcon from '@mui/icons-material/Favorite';
import ArchiveIcon from '@mui/icons-material/Archive';
import Paper from '@mui/material/Paper';
import {List, ListItem, ListItemText} from '@mui/material';
import Link from "next/link";
import { useTheme } from '@mui/material/styles';
import useMediaQuery from '@mui/material/useMediaQuery';

interface Props {
    /**
     * Injected by the documentation to work in an iframe.
     * You won't need it on your project.
     */
    window?: () => Window;
    children: React.ReactElement;
}

function ElevationScroll(props: Props) {
    const {children, window} = props;
    // Note that you normally won't need to set the window ref as useScrollTrigger
    // will default to window.
    // This is only being set here because the demo is in an iframe.
    const trigger = useScrollTrigger({
        disableHysteresis: true,
        threshold: 0,
        target: window ? window() : undefined,
    });

    return React.cloneElement(children, {
        elevation: trigger ? 4 : 0,
    });
}

const handleChange = (event: any, newValue: any) => {
    window.location.href = window.location.origin + '/' + newValue;
};

const Home: NextPage = () => {
    const [value, setValue] = React.useState('recents');
    const theme = useTheme();
    const matches = useMediaQuery(theme.breakpoints.up('sm'));

    return (
        <>
            <Head>
                <title>Homepage | Your Website</title>
            </Head>
            <ElevationScroll>
                <AppBar>
                    <Toolbar>
                        <Typography variant="h6" component="div">
                            Scroll to elevate App bar
                        </Typography>
                    </Toolbar>
                </AppBar>
            </ElevationScroll>
            <Toolbar/>
            <Container maxWidth='xl'>
                <Box>
                    <Title variant='h4'>Page 2</Title>
                </Box>
                <Box sx={{my: 2}}>
                    {[...new Array(1000)]
                        .map(
                            () => `Cras mattis consectetur purus sit amet fermentum.
Cras justo odio, dapibus ac facilisis in, egestas eget quam.
Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
Praesent commodo cursus magna, vel scelerisque nisl consectetur et.`,
                        )
                        .join('\n')}
                </Box>
                <Box mt={2} gap={2}>
                    <Button variant='contained'>MUI Button</Button>
                    <Button variant='dashed'>MUI Button Dashed</Button>
                    <MyButton/>
                </Box>
            </Container>
            <Paper sx={{position: 'fixed', bottom: 0, left: 0, right: 0}} elevation={3}>
                <List component="nav">
                    <Link href="/">
                        <ListItem button component="a">
                            <ListItemText>Homepage</ListItemText>
                        </ListItem>
                    </Link>
                    <Link href="/page1">
                        <ListItem button component="a">
                            <ListItemText>Page 1</ListItemText>
                        </ListItem>
                    </Link>
                    <Link href="/page2">
                        <ListItem button component="a">
                            <ListItemText>Page 2</ListItemText>
                        </ListItem>
                    </Link>
                </List>
            </Paper>
            {!matches && <Paper sx={{position: 'fixed', bottom: 0, left: 0, right: 0}} elevation={3}>
                <BottomNavigation
                    showLabels
                    value={value}
                    onChange={handleChange}
                >
                    <BottomNavigationAction value="" label="Homepage" icon={<RestoreIcon/>}/>
                    <BottomNavigationAction value="page1" label="Page1" icon={<FavoriteIcon/>}/>
                    <BottomNavigationAction value="page2" label="Page2" icon={<ArchiveIcon/>}/>
                </BottomNavigation>
            </Paper>
            }
        </>
    );
};

export default Home;
